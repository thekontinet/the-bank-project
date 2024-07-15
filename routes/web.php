<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountHoldersController;
use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\CryptoWalletController;
use App\Http\Controllers\Admin\InvestmentController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\SendMailController;
use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\TransactionGeneratorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\TransactionController as ApiTransactionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\CryptoDepositController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserKycController;
use Illuminate\Support\Facades\Route;

Route::get('/', PageController::class);
Route::get('/pages/{page}', PageController::class)->name('page');

Route::get('/check-human', [CaptchaController::class, 'create'])->name('captcha.create');
Route::post('/check-human', [CaptchaController::class, 'store'])->name('captcha.store');

Route::middleware(['auth', 'verified', 'blocked'])->group(function () {
    Route::resource('accounts', CreateAccountController::class)->only(['create', 'store']);
    Route::resource('accounts', AccountController::class)
        ->only(['index', 'show'])
        ->withoutMiddleware('has_account');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['has_account'])->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::resource('account/holders', AccountHoldersController::class)->parameters(['holders' => 'account']);
        Route::resource('transactions', TransactionController::class);
        Route::resource('send', TransferController::class)->except('store');
        Route::resource('send', TransferController::class)->only('store')->middleware('verified.kyc');
        Route::resource('deposit', CryptoDepositController::class)->except('store');
        Route::resource('deposit', CryptoDepositController::class)->only('store')->middleware('verified.kyc');
        Route::get('cards', CardController::class);
        Route::resource('invest', App\Http\Controllers\InvestmentController::class)->parameter('invest', 'investment');
        Route::resource('stocks', App\Http\Controllers\AssetController::class)->names('assets')->parameter('stocks', 'asset');
    });

    Route::resource('kyc', UserKycController::class)->except(['destory', 'update', 'edit']);
});

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::resource('users', UserController::class);
    Route::resource('accounts', AdminAccountController::class);
    Route::get('transactions/generate', [TransactionGeneratorController::class, 'create'])
        ->name('transactions.generate');
    Route::post('transactions/generate', [TransactionGeneratorController::class, 'store'])
        ->name('transactions.generate');

    /*
     * @TODO: Write test for this routes
     */
    Route::resource('transactions', AdminTransactionController::class);
    Route::resource('tokens', TokenController::class);
    Route::resource('wallets', CryptoWalletController::class);
    Route::resource('mail', SendMailController::class);
    Route::resource('kyc', KycController::class)->only(['index', 'update', 'destroy']);
    Route::resource('loans', LoanController::class);
    Route::resource('assets', AssetController::class);
    Route::resource('investments', InvestmentController::class);
});

Route::middleware('auth')->get('chart/transaction', [ApiTransactionController::class, 'index']);
Route::middleware('auth')->get('chart/transaction-flow', [ApiTransactionController::class, 'calculateTransactionTotalFlow']);

require __DIR__.'/auth.php';
