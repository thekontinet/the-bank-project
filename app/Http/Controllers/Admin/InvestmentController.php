<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index(Request $request)
    {
        $investments = Investment::query()->when($request->query('user_id'), function ($query) use ($request) {
            $query->where('user_id', $request->query('user_id'));
        })->paginate();

        return view('admin.investment.index', compact('investments'));
    }

    public function show(Investment $investment)
    {
        $asset = $investment->asset;

        return view('admin.investment.show', compact('investment', 'asset'));
    }

    public function update(Request $request, Investment $investment)
    {
        $validated = $request->validate([
            'profit' => ['required', 'numeric'],
            'purchase_price' => ['required', 'numeric'],
        ]);

        $investment->fill([
            'profit' => $validated['profit'] * 100,
            'purchase_price' => $validated['purchase_price'] * 100,
        ]);
        $investment->save();

        return back()->with('message', 'investment updated');
    }
}
