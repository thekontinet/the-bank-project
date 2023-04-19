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
        $accountNumber = null;

        while(!$accountNumber){
            $number = mt_rand(1000000000, 9999999999);

            $exists = Account::where('number', $number)->exists();

            if(!$exists){
                $accountNumber = $number;
            }
        }

        return $accountNumber;
    }
}
