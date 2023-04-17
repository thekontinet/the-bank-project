<?php

use App\Models\Account;
use App\Models\User;

use function Pest\Laravel\actingAs;

test('can render dashboard', function () {
    $account = Account::factory()->create();
    actingAs($account->user);
    $response = $this->get('/dashboard');
    $response->assertStatus(200);
    $response->assertSeeText('Recent Transactions');
    $response->assertSeeText($account->firstname);
});
