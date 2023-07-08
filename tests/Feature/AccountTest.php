<?php

use App\Models\Account;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;
use function Pest\Laravel\get;
use function Pest\Laravel\assertModelExists;

uses(RefreshDatabase::class);

it('can render all users accounts', function () {
    $user = User::factory()->create();
    actingAs($user);
    $response = get('/accounts');

    $response->assertStatus(200);
});

it('cannot render another users account in list', function () {
    $account1 = Account::factory()->create();
    $account2 = Account::factory()->create();
    actingAs($account1->user);

    $response = get('/accounts');

    $response->assertStatus(200);
    $response->assertSeeText($account1->number, false);
    $response->assertDontSeeText($account2->number);
});

it('can show an account', function () {
    $account = Account::factory()->create();
    actingAs($account->user);
    $response = get(route('accounts.show', $account));

    $response->assertStatus(200);
    $response->assertSee($account->name);
    $response->assertSee($account->number);
});

it('cannot show another users account', function () {
    $account1 = Account::factory()->create();
    $account2 = Account::factory()->create();
    actingAs($account1->user);

    $response = get(route('accounts.show', $account2));

    $response->assertStatus(404);
});

