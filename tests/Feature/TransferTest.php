<?php

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\put;
use function PHPUnit\Framework\assertTrue;

it('has transfer page', function () {
    actingAs(User::factory()->create());
    $response = $this->get('/send/create');

    $response->assertStatus(200);
});

it('can initiate transfer', function () {
    $user = User::factory()->has(Account::factory())->create();
    $user->account->credit(10000);
    actingAs($user);

    $response = $this->post('/send',[
        'account' => $user->accounts()->first()->number,
        'amount' => 100,
        'name' => fake()->name(),
        'account_number' => '1111111111',
        'bank' => fake()->company()
    ]);

    $response->assertRedirect();
    assertTrue($user->transactions()->first()->status === null);
});


it('can confirm transfer with pin', function () {
    $user = User::factory()->has(Account::factory())->create();
    $user->account->credit(10000);
    actingAs($user);

    $response = $this->post('/send',[
        'account' => $user->accounts()->first()->number,
        'amount' => 100,
        'name' => fake()->name(),
        'account_number' => '1111111111',
        'bank' => fake()->company()
    ]);

    $transaction = Transaction::first();
    put("/transactions/$transaction->id", [
        'transaction_pin' => '1234'
    ]);

    $transaction->refresh();
    $response->assertRedirect();
    assertTrue($transaction->status === Transaction::STATUS_PENDING);
});


it('cannot confirm transfer with wrong pin', function () {
    $user = User::factory()->has(Account::factory())->create();
    $user->account->credit(10000);
    actingAs($user);

    $response = $this->post('/send',[
        'account' => $user->accounts()->first()->number,
        'amount' => 100,
        'name' => fake()->name(),
        'account_number' => '1111111111',
        'bank' => fake()->company()
    ]);

    $transaction = Transaction::first();
    put("/transactions/$transaction->id", [
        'transaction_pin' => '000'
    ]);

    $transaction->refresh();
    $response->assertRedirect();
    assertTrue($transaction->status === null);
});