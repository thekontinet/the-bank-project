<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TransactionAlert;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use App\Service\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::paginate();
        return view('admin.transaction.index', compact('transactions'));
    }
    public function create(Request $request){
        $account = Account::whereNumber($request->account)->firstOrFail();
        return view('admin.transaction.create', compact('account'));
    }

    public function store(Request $request){
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
            'status' => Transaction::STATUS_SUCCESS
        ]);

        return redirect()->route('admin.accounts.show', $account)->with('message', 'Transaction successful');
    }

    public function show(Transaction $transaction){
        return view('admin.transaction.show', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction, TransactionService $transactionService){
        $request->validate([
            'action' => ['sometimes', 'required', Rule::in([Transaction::STATUS_FAILED, Transaction::STATUS_SUCCESS])],
            'created_at' => ['sometimes', 'required', 'date']
        ]);

        if($request->created_at){
            $transaction->update(['created_at' => $request->created_at]);
        }

        if($request->action){
            if($request->action === Transaction::STATUS_SUCCESS){
                $transactionService->processTransaction($transaction);
            }else{
                $transaction->update(['status' => $request->action]);
            }
        }

        return redirect()->back()->with('message', 'Transaction update complete');
    }
}
