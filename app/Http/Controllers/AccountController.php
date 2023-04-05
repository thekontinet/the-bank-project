<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display all accounts of auth user
     */
    public function index(Request $request){
        $accounts = Account::whereUserId(auth()->id())->get();
        return view('account.index', compact('accounts'));
    }

    /**
     * Display single account of auth user
     */
    public function show(Account $account){
        abort_if($account->user_id !== auth()->id(), 403);
        return view('account.show', compact('account'));
    }
}
