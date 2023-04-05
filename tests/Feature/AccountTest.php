<?php

use App\Models\Account;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;
use function Pest\Laravel\get;
use function Pest\Laravel\assertModelExists;

it('can render all users accounts', function () {
    $user = User::factory()->create();
    actingAs($user);
    $response = get('/accounts');

    $response->assertStatus(200);
});

it('cannot render another users account in list', function () {
    $account1 = Account::factory()->for(User::factory())->create();
    $account2 = Account::factory()->for(User::factory())->create();

    actingAs($account1->user);

    $response = get('/accounts');

    $response->assertStatus(200);
    $response->assertSeeText($account1->short_number);
    $response->assertDontSeeText($account2->short_number);
});

it('can render an accounts', function () {
    $account = Account::factory()->for(User::factory())->create();
    actingAs($account->user);
    $response = get('/accounts/' . $account->id);

    $response->assertStatus(200);
    $response->assertSee($account->name);
    $response->assertSee($account->number);
});

it('cannot render another users account', function () {
    $account1 = Account::factory()->for(User::factory())->create();
    $account2 = Account::factory()->for(User::factory())->create();
    actingAs($account1->user);
    $response = get('/accounts/' . $account2->id);

    $response->assertStatus(403);
});

