<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\CryptoWalletController;
use App\Http\Controllers\Admin\SendMailController;
use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\TransactionGeneratorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CryptoDepositController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', PageController::class);
Route::get('/pages/{page}', PageController::class);


Route::middleware(['auth', 'verified', 'blocked'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('accounts', AccountController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('send', TransferController::class);
    Route::resource('deposit', CryptoDepositController::class);
    Route::get('cards', CardController::class);
});

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function(){
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::resource('users', UserController::class);
    Route::resource('accounts', AdminAccountController::class);
    Route::get('transactions/generate', [TransactionGeneratorController::class, 'create'])->name('transactions.generate');
    Route::post('transactions/generate', [TransactionGeneratorController::class, 'store'])->name('transactions.generate');
    Route::resource('transactions', AdminTransactionController::class);
    Route::resource('tokens', TokenController::class);
    Route::resource('wallets', CryptoWalletController::class);
    Route::resource('mail', SendMailController::class);
});

Route::middleware('auth')->get('chart/transaction', function(){
    $currentMonth = now()->subMonths(4)->format('Y-m');
    $transactions = Transaction::where('user_id', auth()->id())
        ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') >= '$currentMonth'")
        ->orderBy('created_at')
        ->get();

    $data = [];

    foreach ($transactions as $transaction) {
        $data[] = [
            'x' => $transaction->created_at->toIso8601String(),
            'y' => $transaction->amount / 100,
        ];
    }

    return response()->json($data);
});


require __DIR__.'/auth.php';
