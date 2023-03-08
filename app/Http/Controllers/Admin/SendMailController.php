<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function create(Request $request){
        $user = User::find($request->user_id);
        $email = $user->email ?? null;
        return view('admin.mail.create', compact('email'));
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'message' => 'required'
        ]);

        Mail::to($request->email)->send(new Message($request->title, $request->message));

        return back()->with('message', 'Message sent');
    }
}
