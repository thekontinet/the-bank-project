<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Service\TransactionService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index(Request $request){
        $user = User::findOrFail($request->user_id);
        $accounts = $user->accounts;

        return view('admin.account.index', compact('accounts', 'user'));
    }

    public function create(Request $request){
        $user = User::findorFail($request->user_id);
        return view('admin.account.create', compact('user'));
    }

    public function store(Request $request, TransactionService $transactionService)
    {
        try{
            $request->validate([
                'name' => ['required'],
                'user_id' => ['required', 'exists:users,id'],
                'type' => ['required'],
                'balance' => ['required', 'numeric'],
                'currency' => ['required', Rule::in(array_keys(config('money')))]
            ]);

            DB::transaction(function() use($request, $transactionService){
                $user = User::find($request->user_id);
                $account = Account::make($user, $request->type, $request->currency);
                $account->update([
                    'name' => $request->name,
                ]);

                $transaction = $transactionService->deposit($account, $request->balance);
                $transaction->description = 'Opening Balance';
                $transactionService->processTransaction($transaction);
            });

            return redirect()->route('admin.accounts.index', ['user_id' => $request->user_id]);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function show(Account $account){
        $user = auth()->user();
        return view('admin.account.show', compact('account', 'user'));
    }

    public function destroy(Account $account){
        $account->delete();
        return redirect()->back();
    }
}
