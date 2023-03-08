<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Service\TransactionService;
use Illuminate\Http\Request;

class CryptoDepositController extends Controller
{
    public function create(){
        $wallets = Wallet::all();
        $walletsJSON = $wallets->toJson();
        $accounts = Account::whereUserId(auth()->id())->get();
        return view('deposit.cypto', compact('accounts', 'wallets', 'walletsJSON'));
    }

    public function store(Request $request, TransactionService $transactionService){
        // validate form
        $request->validate([
            'account' => ['required', 'exists:accounts,number'],
            'wallet' => ['required', 'exists:wallets,id'],
            'amount' => 'required',
        ]);

        // create transaction and mark as pending.
        $account = Account::whereNumber($request->account)->first();
        $wallet = Wallet::find($request->wallet);

        $transaction = $transactionService->deposit($account, $request->amount, $wallet);

        return redirect()->route('transactions.edit', $transaction->id);
    }
}
