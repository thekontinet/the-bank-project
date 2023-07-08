<?php

use App\Models\Account;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function PHPUnit\Framework\assertTrue;

it('can render transaction generation page', function () {
    $account = Account::factory()->for(User::factory()->admin())->create();
    actingAs($account->user);
    $response = $this->get("/admin/transactions/generate?account={$account->number}");

    $response->assertStatus(200);
});

it('can generate transaction for an account', function () {
    $account = Account::factory()->for(User::factory()->admin())->create();
    actingAs($account->user);

    $response = $this->post("/admin/transactions/generate", [
        'from' => now()->subMonths(10),
        'to' => now(),
        'min' => 10000,
        'max' => 100000,
        'account' => $account->number,
        'quantity' => 10
    ]);

    $response->assertRedirect();
    assertTrue($account->transactions()->count() === 10);
});
