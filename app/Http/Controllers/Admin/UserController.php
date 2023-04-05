<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'name' => ['sometimes', 'required', 'string'],
            'email' => ['sometimes', 'required', 'email'],
            'phone' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image'],
            'blocked' => ['sometimes', 'required', 'boolean'],
            'pin' => ['sometimes', 'required', 'string', 'max:4']
        ]);

        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('public');
            $user->image()->updateOrCreate([], ['path' => $path]);
        }

        try{
            $user->update([
                'name' => $request->name ? $request->name : $user->name,
                'email' => $request->email ? $request->email : $user->email,
                'phone' => $request->phone ? $request->phone : $user->phone,
                'country' => $request->country ? $request->country : $user->country,
                'state' => $request->state ? $request->state : $user->state,
                'blocked' => $request->blocked ? $request->blocked : $user->blocked,
                'pin' => $request->pin ? $request->pin : $user->pin
            ]);


            return redirect()->back()->with('message', 'Profile update successful');
        }catch(\Exception $e){
            report($e);
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy(User $user){
        DB::transaction(function() use($user){
            $user->transactions()->delete();
            $user->delete();
        });
        return back()->with('message', 'Deleted');
    }
}
