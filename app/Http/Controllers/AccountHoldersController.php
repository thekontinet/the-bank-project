<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountHoldersController extends Controller
{
    public function edit(Request $request, Account $account){
        return view('account.holders-create', compact('account'));
    }

    public function update(Request $request, Account $account){
        // verify password
        $request->validate([
            'emails' => ['required','array'],
            'emails.*' => ['email', 'exists:users,email'],
            'password' => ['required', 'current_password']
        ],[
            'emails.*.exists' => 'Some of the emails provided, do not have an account with us.'
        ]);

        // add holders
        $emails = [auth()->user()->email, ...$request->emails];
        $users = User::whereIn('email', $emails)->pluck('id');
        $account->holders()->syncWithoutDetaching($users);

        // redirect to account details
        $path = $request->user()->hasAdminRole() ? 'admin.accounts.show' : 'accounts.show';
        return to_route($path, $account)->with([
            'message' => 'Holders has been added'
        ]);
    }

    public function destroy(Account $account, Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::whereEmail($request->email)->first();

        $account->holders()->detach($user);

        return to_route('admin.accounts.show', $account)->with([
            'message' => 'Holder removed'
        ]);
    }
}
