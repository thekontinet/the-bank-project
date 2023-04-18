<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Create Bank account form
     */
    public function create(){
        return view(theme_path('account.create'));
    }

    /**
     * Save Bank Account
     */
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(Account::TYPES)],
            'currency' => ['required', Rule::in(array_keys(config('money')))],
            'is_joint' => ['boolean']
        ]);

        $user = auth()->user();
        $account = Account::make($user, $request->type, $request->currency, $request->is_joint);

        return to_route('accounts.show', $account)->with(['message' => 'Account created successfully']);
    }

    /**
     * Display all accounts of auth user
     */
    public function index(Request $request){
        $accounts = $request->user()->accounts()->get();
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
