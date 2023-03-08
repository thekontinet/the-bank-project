<?php
namespace App\Builders;

use App\Models\Account;
use App\Models\Transaction;

class TransactionBuilder{
    private Transaction $transaction;

    public function __construct(Account $account, int $amount){
        $transaction = new Transaction;
        $this->transaction = $transaction;
        $this->account($account)->amount($amount);
    }

    public function reset(){
        $this->transaction = new Transaction;
        return $this;
    }

    public function account(Account $account){
        $this->transaction->account_id = $account->id;
        $this->transaction->user_id = $account->user_id;
        $this->transaction->currency = $account->currency;
        $this->transaction->status = null;
        return $this;
    }

    public function type(string $type){
        $this->transaction->type = strtolower($type);
        return $this;
    }

    public function status(string $status){
        if(!in_array($status, [
            Transaction::STATUS_FAILED,
            Transaction::STATUS_PENDING,
            Transaction::STATUS_SUCCESS,
            Transaction::STATUS_PROCESSING,
        ])){
            throw new \Exception('Invalid transaction status');
        }

        $this->transaction->status = $status;
        return $this;
    }

    public function amount(int $amount){
        $this->transaction->amount = $amount * 100;
        return $this;
    }

    public function description(string $desc){
        $this->transaction->description = $desc;
        return $this;
    }

    public function data(array | string $key, string $value = ''){
        if(is_array($key)){
            $newData = array_merge($this->transaction->data ?? [], $key);
            $this->transaction->data = $newData;
        }else{
            $newData = array_merge($this->transaction->data ?? [], [$key => $value]);
            $this->transaction->data = $newData;
        }
        return $this;
    }

    public function save(){
        $this->transaction->save();
        return $this->transaction;
    }
}
