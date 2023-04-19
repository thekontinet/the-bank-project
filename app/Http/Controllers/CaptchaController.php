<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function create(){
        return view(theme_path('captcha.form'));
    }

    public function store(Request $request){
        $request->validate(['captcha' => 'required|captcha'], ['captcha' => 'Incorrect. Please try again']);
        $request->session()->put('has_captcha', 'on');
        return to_route('login')->with(['message' => 'Captch verified successfully']);
    }
}
