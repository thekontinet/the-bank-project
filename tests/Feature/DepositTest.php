<?php

use App\Http\Middleware\RequiresKyc;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\put;
use function Pest\Laravel\withoutMiddleware;
use function PHPUnit\Framework\assertTrue;

uses(RefreshDatabase::class);

beforeEach(function(){
    withoutMiddleware(RequiresKyc::class);
});

it('can render deposit page', function () {
    actingAs(User::factory()->create());
    $response = $this->get('/deposit/create');
    $response->assertStatus(200);
});

it('can intiate deposit', function () {
    $wallet = Wallet::factory()->create();
    $account = Account::factory()->for(User::factory())->create();

    actingAs($account->user);

    $response = $this->post('/deposit',[
        'account' => $account->number,
        'wallet' => $wallet->id,
        'amount' => 10000
    ]);

    $response->assertStatus(302);
    assertTrue($account->transactions()->count() === 1);
});


it("can confirm deposit with pin", function(){
    $wallet = Wallet::factory()->create();
    $account = Account::factory()->for(User::factory())->create();
    actingAs($account->user);

    $response = $this->post('/deposit',[
        'account' => $account->number,
        'wallet' => $wallet->id,
        'amount' => 10000
    ]);

    $transaction = $account->transactions()->first();

    put("/transactions/$transaction->id", [
        'transaction_pin' => '1234'
    ]);

    $transaction->refresh();
    $response->assertRedirect();
    assertTrue($transaction->status === Transaction::STATUS_PENDING);
});


it("cannot confirm deposit with wrong pin", function(){
    $wallet = Wallet::factory()->create();
    $account = Account::factory()->for(User::factory())->create();
    actingAs($account->user);

    $response = $this->post('/deposit',[
        'account' => $account->number,
        'wallet' => $wallet->id,
        'amount' => 10000
    ]);

    $transaction = $account->transactions()->first();

    put("/transactions/$transaction->id", [
        'transaction_pin' => '0000'
    ]);

    $transaction->refresh();
    $response->assertRedirect();
    assertTrue($transaction->status === null);
});
