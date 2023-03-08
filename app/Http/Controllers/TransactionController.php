<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionApprovalRequest;
use App\Models\Account;
use App\Models\Transaction;
use App\Service\TransactionService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::whereUserId(auth()->id())->paginate();
        return view('transaction.index', compact('transactions'));
    }

    public function edit(Transaction $transaction, TransactionService $transactionService){
        try{
            $token =  $transactionService->getToken($transaction);

            if($token){
                return view('send.confirm', compact('transaction', 'token'));
            }

            // request for pin if transaction has no status
            if(!$transaction->status){
                return view('transaction.pin', compact('transaction'));
            }

            return view('send.confirm');
        }catch(Exception $e){
            $transaction->delete();
            throw $e;
        }
    }

    public function update(TransactionApprovalRequest $request, Transaction $transaction, TransactionService $transactionService){
        $request->validated();
        $transactionService->init($transaction);
        return redirect()->back()->with('message', 'Transaction has been queud for verification.');
    }
}
