<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Investment;
use App\Service\TransactionService;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvestmentController extends Controller
{
    public function index()
    {
        $assets = Asset::paginate();
        $investments = Investment::where([
            'user_id' => auth()->id(),
        ])->paginate();

        return view('investment.index', compact('investments', 'assets'));
    }

    public function store(Request $request, TransactionService $transactionService)
    {
        $request->validateWithBag('buy', [
            'account' => ['required', 'exists:accounts,id'],
            'asset' => ['required', 'exists:assets,id'],
            'amount' => ['required', 'numeric', 'min:10'],
        ]);

        DB::transaction(function () use ($request, $transactionService) {
            $asset = Asset::find($request->get('asset'));
            $account = auth()->user()->accounts()->find($request->get('account'));
            $investment = $asset->getUserInvestment(auth()->user());
            $amount = $request->get('amount') * 100;

            if ($investment) {
                $investment->fill([
                    'shares_count' => $investment->shares_count + $amount / $asset->price,
                    'purchase_price' => (string) BigInteger::of($investment->purchase_price)->plus($amount),
                ]);
            } else {
                $investment = Investment::make([
                    'user_id' => auth()->id(),
                    'asset_id' => $request->get('asset'),
                    'shares_count' => $amount / $asset->price,
                    'purchase_price' => (string) Biginteger::of($request->get('amount'))->multipliedBy(100),
                    'profit' => 0,
                ]);
            }

            // debit account
            $transaction = $transactionService->withdraw($account, $request->get('amount'));
            $transactionService->processTransaction($transaction);

            // save investment
            $investment->save();
        });

        // redirect to dashboard
        return to_route('assets.show', $request->get('asset'));
    }

    public function update(Request $request, Investment $investment, TransactionService $transactionService)
    {
        $request->validateWithBag('sell', [
            'account' => ['required', 'exists:accounts,id'],
        ]);

        $account = auth()->user()->accounts()->find($request->get('account'));
        // credit account
        $transaction = $transactionService->deposit($account, $investment->total / 100);
        $transactionService->processTransaction($transaction);
        $investment->delete();

        // redirect to dashboard
        return to_route('dashboard')->with('message', 'Investment withdrawal successful');
    }
}
