<?php

use App\Models\User;

test('can render dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $response = $this->get('/dashboard');
    $response->assertStatus(200);
    $response->assertSeeText('Recent Transactions');
    $response->assertSeeText($user->firstname);
});
