<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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


        return response()->view('dashboard', [
            'user' => $user,
            'accounts' => $user->accounts,
            'assets' => Asset::query()->paginate(4),
            'transactions' => $transactions
        ]);
    }
}
