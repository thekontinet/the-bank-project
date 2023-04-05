<?php

namespace App\Http\Controllers;

use App\Models\UserKyc;
use Illuminate\Http\Request;

class UserKycController extends Controller
{
    public function create(){
        $kyc = auth()->user()->kyc;

        if($kyc) return to_route('kyc.show', $kyc->id);

        return view('kyc.form');
    }


    public function store(Request $request){
        $request->validate([
            'document_type' => 'required|string|max:255',
            'document_number' => 'required|string|max:255',
            'document_front_image' => 'required|image',
            'document_back_image' => 'sometimes|required|image',
        ]);

        $user = auth()->user();

        if ($user->kyc) {
            return back()->with([
                'message' => 'KYC already submitted'
            ]);
        }

        $frontImage = $request->file('document_front_image');
        $frontImageName = time() . rand(1000, 9000) .'.'.$frontImage->getClientOriginalExtension();
        $frontImage->move(public_path('uploads'), $frontImageName);

        $backImageName = null;
        if($request->file('document_back_image')){
            $backImage = $request->file('document_back_image');
            $backImageName = time() . rand(1000, 9000) .'.'.$backImage->getClientOriginalExtension();
            $backImage->move(public_path('uploads'), $backImageName);
        }

        $kyc = new UserKyc([
            'document_type' => $request->document_type,
            'document_number' => $request->document_number,
            'document_front_image' => $frontImageName,
            'document_back_image' => $backImageName,
        ]);

        $user->kyc()->save($kyc);

        return back()->with([
            'message' => 'done'
        ]);
    }

    public function show($id){
        $kyc = auth()->user()->kyc()->find($id);

        if(!$kyc) return to_route('kyc.create');

        return view('kyc.status', compact('kyc'));
    }
}
