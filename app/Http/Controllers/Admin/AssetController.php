<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::paginate();

        return view('admin.asset.index', compact('assets'));
    }

    public function create(Request $request)
    {
        $assetData = $this->getAssetQuote($request->query('symbol'));

        return view('admin.asset.create', compact('assetData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'symbol' => ['required', 'unique:assets,symbol'],
        ], [
            'symbol.unique' => 'the asset already exist',
        ]);

        $assetData = $this->getAssetQuote($request->input('symbol'));
        $assetData['description'] = $this->getAssetData($request->input('symbol'))['Description'] ?? null;
        $assetData['exchange'] = $this->getAssetData($request->input('symbol'))['Exchange'] ?? null;

        Asset::create([
           'name' => $assetData['name'],
           'symbol' => $assetData['symbol'],
           'price' => $assetData['price'] * 100,
           'currency' => $assetData['currency'],
           'logo_url' => $assetData['logo_url'] ?? '',
           'data' => $assetData,
        ]);

        return to_route('admin.assets.index')->with('message', 'Asset has been added');
    }

    public function destroy(Request $request, Asset $asset)
    {
        $asset->delete();

        return to_route('admin.assets.index')->with('message', 'Asset has been removed');
    }

    private function getAssetQuote(?string $symbol)
    {
        if (!$symbol) {
            return null;
        }

        $symbol = strtoupper($symbol);

        return Cache::remember('fetch-asset-'.$symbol, now()->addDay(), function () use ($symbol) {
            $token = '60ab46e7fc60456abc9084d4a8988c4e';
            $client = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]);

            $response = $client->get("https://api.profit.com/data-api/market-data/quote/$symbol?token=$token");

            $data = $response->json();

            return empty($data) ? null : $data;
        });
    }

    private function getAssetData(?string $symbol)
    {
        if (!$symbol) {
            return null;
        }

        $symbol = strtoupper($symbol);

        return Cache::remember('fetch-asset-description-'.$symbol, now()->addDay(), function () use ($symbol) {
            $token = '60ab46e7fc60456abc9084d4a8988c4e';
            $client = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]);

            $response = $client->get("https://api.profit.com/data-api/fundamentals/stocks/general/$symbol?token=$token");

            $data = $response->json();

            return empty($data) ? null : $data;
        });
    }
}
