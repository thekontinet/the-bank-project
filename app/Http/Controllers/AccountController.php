<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request){
        $accounts = Account::whereUserId(auth()->id())->get();
        return view('account.index', compact('accounts'));
    }

    public function show(Account $account){
        return view('account.show', compact('account'));
    }
}
