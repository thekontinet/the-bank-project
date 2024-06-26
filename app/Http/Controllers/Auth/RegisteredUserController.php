<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use PragmaRX\Countries\Package\Countries;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // TODO: Add the country field to view
        $countries = Countries::all()->pluck('name.common');
        return view(theme_path('auth.register'), compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255', Rule::in(getCountries()->toArray())],
            'state' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'pin' => ['required', 'max:4'],
            'agree' => ['sometimes', 'required', 'max:4'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'country' => $request->country,
            'state' => $request->state,
            'email' => $request->email,
            'pin' => $request->pin,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        if(auth()->check()){
            return to_route('admin.users.index');
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
