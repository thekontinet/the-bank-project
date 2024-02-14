<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CryptoWalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::paginate();

        return view('admin.crypto.index', compact('wallets'));
    }

    public function create()
    {
        $cryptos = $this->getCryptoData();

        return view('admin.crypto.create', compact('cryptos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'symbol' => ['required'],
            'image_url' => ['required', 'url'],
            'address' => ['required'],
        ]);

        Wallet::create($data);

        return back()->with('message', 'Added successfully');
    }

    private function getCryptoData()
    {
        $cacheKey = __CLASS__.__FUNCTION__.':cache';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $url = 'https://api.coinranking.com/v2/coins?referenceCurrencyUuid=Qwsogvtv82FCd';
        $response = Http::get($url);

        if (!$response->successful()) {
            return abort('400', 'Something went wrong please try again');
        }

        $cryptos = $response->json('data.coins');
        cache()->put($cacheKey, $cryptos, now()->addHours(12));

        return $cryptos;
    }

    public function destroy($id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->delete();

        return back()->with('message', 'Deleted');
    }
}
