<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function create(Request $request)
    {
        $user = User::query()->findOrFail($request->query('user_id'));

        return view('admin.loan.create', [
            'loan' => $user->loan,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'amount' => ['required', 'integer'],
            'amount_paid' => ['required', 'integer'],
            'interest_rate' => ['required', 'integer'],
            'duration_in_months' => ['required', 'integer'],
        ]);

        Loan::query()->updateOrCreate($request->only(['user_id']), $validated);

        return back()->with('message', 'Loan updated');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return back()->with('message', 'Loan removed');
    }
}
