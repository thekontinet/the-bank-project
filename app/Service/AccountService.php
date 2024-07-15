<?php

namespace App\Service;

use App\DTOs\AccountDTO;
use App\Models\Account;

class AccountService
{
    public static function createAccount(AccountDTO $accountDTO){
        return Account::query()->create([
            'user_id' => $accountDTO->user_id,
            'name' => $accountDTO->name,
            'type' => $accountDTO->type,
            'number' => Account::generateAccountNumber(),
            'currency' => $accountDTO->currency,
            'is_joint' => $accountDTO->is_joint
        ]);
    }
}
