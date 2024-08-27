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
            'amount' => ['required', 'numeric'],
            'amount_paid' => ['required', 'numeric'],
            'interest_rate' => ['required', 'numeric'],
            'duration_in_months' => ['required', 'numeric'],
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
