<?php

namespace App\Service;

use App\DTOs\AccountDTO;
use App\Models\Account;

class AccountService
{
    public static function createAccount(AccountDTO $accountDTO){
        return Account::create([
            'user_id' => $accountDTO->user_id,
            'name' => $accountDTO->name,
            'type' => $accountDTO->type,
            'number' => self::generateAccountNumber(),
            'currency' => $accountDTO->currency,
            'is_joint' => $accountDTO->is_joint
        ]);
    }

    public static function generateAccountNumber(){
        $min = pow(10, 9);
        $max = pow(10, 10) - 1;
        $number = rand($min, $max);
        if(Account::where('number', $number)->exists()){
            return self::generateAccountNumber();
        }
        return $number;
    }
}
