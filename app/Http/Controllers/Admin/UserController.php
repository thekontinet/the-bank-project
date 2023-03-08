<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::withCount('accounts')->paginate('20');
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user){
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image'],
            'blocked' => ['required', 'boolean'],
            'pin' => ['required', 'string', 'max:4']
        ]);

        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('public');
            $user->image()->updateOrCreate([], ['path' => $path]);
        }

        try{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'blocked' => $request->blocked,
                'pin' => $request->pin
            ]);


            return redirect()->back()->with('message', 'Profile update successful');
        }catch(\Exception $e){
            report($e);
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy(User $user){
        $user->delete();

        return back()->with('message', 'Deleted');
    }
}
