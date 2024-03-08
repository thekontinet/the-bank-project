<?php

namespace App\Service;

use App\Exceptions\TransactionException;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Notifications\TransactionSuccess;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    public function getToken(Transaction $transaction)
    {
        return $transaction->account->tokens()->unverified()->first();
    }

    public function deposit(Account $account, float $amount, Wallet $wallet = null)
    {
        $formattedAmount = money($amount * 100, $account->currency);

        return Transaction::make($account, $amount)
            ->type('deposit')
            ->description("$formattedAmount deposit into $account->short_number")
            ->data($wallet ? $wallet->toArray() : [])
            ->save();
    }

    public function withdraw(Account $account, int $amount, Wallet $wallet = null)
    {
        $formattedAmount = money($amount * 100, $account->currency);

        return Transaction::make($account, $amount)
            ->type('withdraw')
            ->description("$formattedAmount withdrawn from $account->short_number")
            ->data($wallet ? $wallet->toArray() : [])
            ->save();
    }

    public function transfer(
        Account $from,
        int $amount,
        string $account_number,
        string $name,
        string $bank,
        string|null $routing_number,
        string|null $swift_code
    ) {
        $formattedAmount = money($amount * 100, $from->currency);
        $from->tokens()->update(['status' => 0]);

        return Transaction::make($from, $amount)
            ->type('transfer.send')
            ->data([
                'account_name' => $name,
                'account_number' => $account_number,
                'bank' => $bank,
                'route' => $routing_number,
                'swift' => $swift_code,
            ])
            ->description("$formattedAmount transfered from $from->short_number")
            ->save();
    }

    public function init(Transaction $transaction)
    {
        return DB::transaction(function () use ($transaction) {
            // process deposit
            if ($transaction->type === 'deposit') {
                $transaction->update(['status' => Transaction::STATUS_PENDING]);

                return true;
            }

            // process transfer
            if ($transaction->type === 'transfer.send') {
                $token = $transaction->account->tokens()->unverified()->first();
                if ($token) {
                    return $token->verify();
                }
                $transaction->update(['status' => Transaction::STATUS_PENDING]);
                $transaction->account->debit($transaction->amount / 100);

                return true;
            }
        });
    }

    public function processTransaction($transaction)
    {
        // process deposit
        if ($transaction->type === 'deposit') {
            return DB::transaction(function () use ($transaction) {
                $transaction->update(['status' => Transaction::STATUS_SUCCESS]);
                $transaction->account->credit($transaction->amount / 100);
                $this->sendNotification($transaction);

                return true;
            });
        }

        if ($transaction->type === 'withdraw') {
            return DB::transaction(function () use ($transaction) {
                $transaction->update(['status' => Transaction::STATUS_SUCCESS]);
                $transaction->account->debit($transaction->amount / 100);
                $this->sendNotification($transaction);

                return true;
            });
        }

        // process transfer
        if ($transaction->type === 'transfer.send') {
            return DB::transaction(function () use ($transaction) {
                $transaction->update(['status' => Transaction::STATUS_SUCCESS]);
                $this->creditReciever($transaction);
                $this->sendNotification($transaction);

                return true;
            });
        }
    }

    public function creditReciever(Transaction $transaction)
    {
        $account = Account::where('number', $transaction->data['account_number'])->first();
        if (!$account) {
            return;
        }
        $amount = $transaction->amount / 100;
        $formattedAmount = money($amount * 100, $account->currency);
        $account->credit($amount);
        $newTransaction = Transaction::make($account, $amount)
            ->type('transfer.recieve')
            ->data([
                'account_name' => $transaction->account->name,
                'account_number' => $transaction->account->number,
                'bank' => env('APP_NAME'),
            ])
            ->status(Transaction::STATUS_SUCCESS)
            ->description("$formattedAmount sent to $account->short_number from {$transaction->account->short_number}")
            ->save();

        $this->sendNotification($newTransaction);

        return $newTransaction;
    }

    public function sendNotification(Transaction $transaction)
    {
        $transaction->notify(new TransactionSuccess($transaction));
    }

    public function getStatus($key = null)
    {
        $statuses = [
            Transaction::STATUS_FAILED,
            Transaction::STATUS_PROCESSING,
            Transaction::STATUS_SUCCESS,
            Transaction::STATUS_PENDING,
        ];

        $keys = array_flip($statuses);

        if ($key != null && !array_key_exists($key, $keys)) {
            throw new TransactionException('Key not found');
        }

        return $key ? $key : $statuses;
    }

    public function update(Transaction $transaction, $data)
    {
        if ($data['amount']) {
            $data['amount'] *= 100;
        }
        if ($data['status'] && !in_array($data['status'], $this->getStatus())) {
            throw new TransactionException('Invalid transaction status');
        }
        if ($data['status'] && $data['status'] == $this->getStatus('success')) {
            $this->processTransaction($transaction);
        }

        return $transaction->update($data);
    }
}
