<?php

use App\Models\Account;
use App\Models\Token;
use App\Models\Transaction;
use App\Models\User;
use App\Service\TransactionService;

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\get;
use function Pest\Laravel\put;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

uses(RefreshDatabase::class);

test('it can render user transaction', function () {
    $account = Account::factory()->create();
    actingAs($account->user);

    $response = $this->get('/transactions');

    $response->assertStatus(200);
});

it('users cannot see the transaction admin settings icon', function () {
    $user = User::factory()->admin()->create();
    actingAs($user);

    $response = get(route('admin.transactions.index'));

    $response->assertStatus(200);
    $response->assertDontSee('transaction settings');
});

it('admin can see the transaction admin settings icon', function () {
    $user = User::factory()->admin()->create();
    Transaction::factory(10)->create();
    actingAs($user);

    $response = get(route('admin.transactions.index'));

    $response->assertStatus(200);
    $response->assertSee('transaction settings');
});

it('user cannot see the transaction admin settings icon', function () {
    $account = Account::factory()->create();
    Transaction::factory(10)->create([
        'account_id' => $account->id
    ]);
    actingAs($account->user);

    $response = get(route('transactions.index'));

    $response->assertStatus(200);
    $response->assertDontSee('transaction settings');
});

it('can require token', function(){
    $account = Account::factory()->for(User::factory())->has(Token::factory())->create();
    $account->credit(1000);

    actingAs($account->user);

    $ts = app(TransactionService::class);
    $ts->transfer($account, 100, '1234567890', 'test_name', 'test_bank', '', '');

    $request = put("/transactions/$account->id", [
        'transaction_pin' => '1234'
    ]);

    $transaction = $account->transactions()->first();

    $request->assertRedirect();
    assertTrue($transaction && $transaction->status === null);
});

it('can verify token', function(){
    $account = Account::factory()->for(User::factory())->has(Token::factory())->create();
    $account->credit(1000);

    actingAs($account->user);

    $ts = app(TransactionService::class);
    $ts->transfer($account, 100, '1234567890', 'test_name', 'test_bank', '', '');

    $transaction = Transaction::first();

    $request = put("/transactions/$transaction->id", [
        'token' => $account->tokens()->first()->token
    ]);

    $request = put("/transactions/$transaction->id", [
        'transaction_pin' => '1234'
    ]);

    $transaction = $account->transactions()->first();

    $request->assertRedirect();
    assertTrue($transaction && $transaction->status === Transaction::STATUS_PENDING);
});

it('can initiate a transaction', function(){
    $account = Account::factory()->for(User::factory())->create();
    $account->credit(1000);

    actingAs($account->user);
    $ts = app(TransactionService::class);
    $ts->transfer($account, 100, '1234567890', 'test_name', 'test_bank', '', '');

    $request = put("/transactions/$account->id", [
        'transaction_pin' => '1234'
    ]);

    $account->refresh();

    $request->assertRedirect();

    $transaction = $account->transactions()->first();
    assertEquals($account->balance, 90000);
    assertTrue($transaction && $transaction->amount === 10000);
    assertTrue($transaction && $transaction->status === Transaction::STATUS_PENDING);
});
