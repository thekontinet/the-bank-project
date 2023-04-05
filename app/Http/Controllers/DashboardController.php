<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    /**
     * Display Dashboard Page.
     */
    public function __invoke(Request $request): Response
    {
        $user = auth()->user();
        $transactions = Transaction::whereUserId($user->id)->limit(5)->get();

        $thirtyDaysAgo = Carbon::now()->subDays(30);
        $transactionSummary = Transaction::selectRaw('
            SUM(CASE WHEN transactions.type = "deposit" THEN transactions.amount ELSE 0 END) AS total_deposit,
            SUM(CASE WHEN transactions.type <> "deposit" THEN transactions.amount ELSE 0 END) AS total_withdrawal,
            SUM(transactions.amount) as total,
            currency
        ')
        ->whereUserId($user->id)
        ->where('created_at', '>=', $thirtyDaysAgo)
        ->groupBy(['currency'])
        ->first();

        return response()->view('dashboard', [
            'user' => $user,
            'transactions' => $transactions,
            'total_deposit' => !$transactionSummary ? 0 : money($transactionSummary->total_deposit, $transactionSummary->currency) ?? 0,
            'total_deposit_progress' => !$transactionSummary ? 0 : $transactionSummary->total_deposit/$transactionSummary->total * 100 ?? 0,
            'total_withdraw' => !$transactionSummary ? 0 : money($transactionSummary->total_withdrawal, $transactionSummary->currency) ?? 0,
            'total_withdraw_progress' => !$transactionSummary ? 0 : $transactionSummary->total_withdrawal/$transactionSummary->total * 100 ?? 0,
        ]);
    }
}
