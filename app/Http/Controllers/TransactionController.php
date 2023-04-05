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
    /**
     * Display all transactions of auth user
     */
    public function index(){
        $transactions = Transaction::whereUserId(auth()->id())->paginate();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Displays token form if transaction has token otherwise displays a pin form
     * Displays a confirmation page if transaction has been initiated
     */
    public function edit(Transaction $transaction, TransactionService $transactionService){
        try{
            $token =  $transactionService->getToken($transaction);

            if($token){
                return view('send.token-request', compact('transaction', 'token'));
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

    /**
     * Initiate the transaction by setting the status from null to pending
     * if it passes all validation
     */
    public function update(TransactionApprovalRequest $request, Transaction $transaction, TransactionService $transactionService){
        $request->validated();
        $transactionService->init($transaction);
        return redirect()->back()->with('message', 'Transaction has been queud for verification.');
    }
}
