<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserKyc;
use Illuminate\Http\Request;

class KycController extends Controller
{
    public function index(){
        $kycs = UserKyc::latest()->paginate();
        return view('admin.kyc.index', compact('kycs'));
    }

    public function update(Request $request, UserKyc $kyc){
        if($kyc->isVerified()){
            $kyc->unverify();
        }else{
            $kyc->verify();
        }

        return back()->with(['message' => "Kyc Status updated"]);
    }

    public function destroy(Request $request, UserKyc $kyc){
        $kyc->delete();
        return to_route('admin.kyc.index')->with(['message' => "KYC info deleted"]);
    }
}
