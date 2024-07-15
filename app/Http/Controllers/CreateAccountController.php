<?php

namespace App\Http\Controllers;

use App\DTOs\AccountDTO;
use App\Models\Account;
use App\Service\AccountService;
use Illuminate\Http\Request;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class CreateAccountController extends Controller
{
    public function __construct(private AccountService $accountService){}
    public function create(){
        $accountTypes = Account::TYPES;
        return view(theme_path('account.create'), compact('accountTypes'));
    }

    /**
     * Save Bank Account
     */
    public function store(Request $request){
        try {
            $this->accountService->createAccount(AccountDTO::fromRequest($request));
            return to_route('dashboard')->with(['message' => 'Account created successfully']);
        } catch (\Exception $e) {
            logger()->error($e);
            return to_route('dashboard')->with(['error' => 'Account could not be created']);
        }
    }
}
