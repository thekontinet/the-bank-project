<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display Dashboard Page.
     */
    public function __invoke(Request $request): Response
    {
        /** @var User $user */
        $user = auth()->user();
        $transactions = Transaction::whereUserId($user->id)->limit(5)->get();

        $thirtyDaysAgo = Carbon::now()->subDays(30);

        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");

        return response()->view('dashboard', [
            'user' => $user,
            'accounts' => $user->accounts,
            'assets' => Asset::query()->paginate(4),
            'transactions' => $transactions
        ]);
    }
}
