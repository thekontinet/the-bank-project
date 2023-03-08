<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PinController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePin', [
            'pin' => ['required', 'max:4', 'confirmed'],
        ]);

        $request->user()->update([
            'pin' => $validated['pin'],
        ]);

        return to_route('dashboard')
            ->with('status', 'pin-updated')
            ->with('message', 'Pin updated successfully');
    }
}
