<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;
use function PHPUnit\Framework\assertTrue;

test('admin can see all users', function () {
    $users = User::factory()->admin(10)->create();
    $user = User::factory()->admin()->create();

    actingAs($user);
    $response = get('/admin/users');

    $response->assertStatus(200);
    $response->assertSeeInOrder($users->pluck('name')->toArray());
});

test('admin can view user info', function () {
    $user = User::factory()->create();
    $admin = User::factory()->admin()->create();

    actingAs($admin);
    $response = get("/admin/users/$user->id/edit");

    $response->assertStatus(200);
    $response->assertSee($user->name);
});

test('admin can update user data', function () {
    $user = User::factory()->create();
    $admin = User::factory()->admin()->create();

    actingAs($admin);
    $response = put("/admin/users/$user->id", [
        'name' => "test name",
        'pin' => "0000",
    ]);

    $user->refresh();

    $response->assertRedirect();
    assertTrue($user->name === 'test name');
    assertTrue($user->pin === '0000');
});

test('admin can delete user data', function () {
    $user = User::factory()->create();
    $admin = User::factory()->admin()->create();

    actingAs($admin);
    $response = delete("/admin/users/$user->id");

    $response->assertRedirect();
    assertModelMissing($user);
});
