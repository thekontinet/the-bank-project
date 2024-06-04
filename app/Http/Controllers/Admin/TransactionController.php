<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use App\Service\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function __construct(private readonly TransactionService $transactionService)
    {}

    public function index()
    {
        $transactions = Transaction::paginate();

        return view('admin.transaction.index', compact('transactions'));
    }

    public function create(Request $request)
    {
        $account = Account::whereNumber($request->account)->firstOrFail();

        return view('admin.transaction.create', compact('account'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_number' => ['required', 'exists:accounts,number'],
            'type' => ['required', 'string', Rule::in(['credit', 'debit'])],
            'amount' => ['required', 'numeric', 'min:10'],
        ]);

        $account = Account::where('number', $request->account_number)->firstOrFail();

        $type = $request->type;
        $account->$type($request->amount);
        Transaction::create([
            'user_id' => $account->user_id,
            'account_id' => $account->id,
            'type' => $request->type,
            'currency' => $account->currency,
            'amount' => $request->amount * 100,
            'description' => $request->description,
            'status' => Transaction::STATUS_SUCCESS,
        ]);

        return redirect()->route('admin.accounts.show', $account)->with('message', 'Transaction successful');
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction, TransactionService $transactionService)
    {
        $request->validate([
            'amount' => ['required', 'numeric'],
            'status' => ['sometimes', 'required'],
            'type' => ['required', 'in:credit,debit'],
            'date' => ['required', 'date'],
            'description' => ['nullable'],
        ]);

        $this->transactionService->update($transaction, [
            'amount' => $request->amount,
            'status' => $request->status,
            'type' => $request->type === 'credit' ? 'credit' : 'withdraw',
            'created_at' => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('message', 'Transaction update complete');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return to_route('admin.transactions.index')->with(['error' => 'Transaction removed']);
    }
}
