<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request){
        $start = $request->start ?? now()->subYear()->format('Y-m-d');
        $end = $request->end ?? now()->format('Y-m-d');
        $transactions = Transaction::where('user_id', auth()->id())
            ->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') >= '$start'")
            ->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') <= '$end'")
            ->orderBy('created_at')
            ->get();

        $data = [];

        foreach ($transactions as $transaction) {
            $data[] = [
                'x' => $transaction->created_at->toIso8601String(),
                'y' => $transaction->amount / 100,
            ];
        }

        return response()->json($data);
    }

    public function calculateTransactionTotalFlow(){
        return Transaction::selectRaw('
                SUM(CASE WHEN transactions.type IN ("deposit", "credit", "transfer.recieve") THEN transactions.amount ELSE 0 END) AS total_deposit,
                SUM(CASE WHEN transactions.type IN ("transfer.send") THEN transactions.amount ELSE 0 END) AS total_withdrawal,
                currency
            ')
            ->whereUserId(auth()->id())
            // ->where('created_at', '>=', now()->subDays(30))
            ->groupBy(['currency'])
            ->first();
    }
}
