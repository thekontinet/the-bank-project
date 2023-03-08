<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Service\TransactionService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;

class TransferController extends Controller
{
    public function create(Request $request){
        $accounts = Account::where('user_id', auth()->id())->get();
        $isWireTransfer = !$request->has('dom');
        return view('send.create', compact('accounts', 'isWireTransfer'));
    }

    public function store(Request $request, TransactionService $transactionService){
        $request->validate([
            'account' => ['required', Rule::exists('accounts', 'number')->where('user_id', auth()->id())],
            'amount' => ['required', 'numeric'],
            'name' => ['required'],
            'account_number' => ['required'],
            'bank' => ['required'],
            'route' => ['nullable'],
            'swift' => ['nullable'],
            'desc' => ['nullable', 'string', 'min:10'],
        ]);

        $account = Account::whereNumber($request->account)->first();

        $transaction = $transactionService->transfer(
            $account,
            $request->amount,
            $request->account_number,
            $request->name,
            $request->bank,
            $request->get('route'),
            $request->get('swift')
        );

        return redirect()->route('transactions.edit', $transaction->id);
    }
}
