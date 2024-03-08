<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(Request $request)
    {
        $assets = Asset::query()->paginate();

        return view('asset.index', compact('assets'));
    }

    public function show(Request $request, Asset $asset)
    {
        $investment = $asset->getUserInvestment(auth()->user());

        return view('asset.show', compact('asset', 'investment'));
    }
}
