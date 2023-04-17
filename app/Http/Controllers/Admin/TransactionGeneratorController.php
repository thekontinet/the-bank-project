<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use App\Service\TransactionService;
use Illuminate\Http\Request;

class TransactionGeneratorController extends Controller
{
    public function create(Request $request){
        $account = Account::whereNumber($request->account)->firstOrFail();
        return view('admin.transaction.generate', compact('account'));
    }

    public function store(Request $request, TransactionService $transactionService){
        $request->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'account' => ['required', 'exists:accounts,number'],
            'quantity' => ['required', 'numeric', 'max:50']
        ]);

        $account = Account::whereNumber($request->account)->first();

        for ($i=0; $i < $request->quantity; $i++) {
            $amount = rand(5000, 100000);
            $created_at =  fake()->dateTimeBetween($request->from, $request->to);
            $bank = fake()->randomElement($this->getBankNames());
            $accountName = fake()->name();
            $accountNumber = Account::generateAccountNumber();
            $route = fake()->numberBetween(10000, 100000);
            $swift = fake()->numberBetween(10000, 100000);
            $type = rand(1,2);

            if($type == 1){
                $transaction = $transactionService->transfer(
                    $account,
                    $amount,
                    $accountNumber,
                    $accountName,
                    $bank,
                    $route,
                    $swift
                );
            }else{
                $transaction = $transactionService->deposit(
                    $account,
                    $amount
                );
            }

            $transaction->created_at = $created_at;
            $transaction->status = Transaction::STATUS_SUCCESS;
            $transaction->save();
        }

        return redirect()->route('admin.accounts.show', $account)->with('message', 'Transaction generated successfully');
    }

    private function getBankNames(){
        return [
            'Wells Fargo',
            'PNC Financial Service',
            'Citigroup',
            'TD Bank',
            'USAA',
            'RBC Bank',
            'Barclays Bank',
        ];
    }
}
