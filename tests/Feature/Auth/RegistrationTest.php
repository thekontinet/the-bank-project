<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use PragmaRX\Countries\Package\Countries;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('registration screen can not be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'country' => Countries::first()->name->common,
        'state' => 'test state',
        'pin' => '1234',
    ]);

    assertModelExists(User::whereEmail('test@example.com')->first());
    $response->assertRedirect(RouteServiceProvider::HOME);
});

test('admin can view registration form', function(){
    actingAs(User::factory()->admin()->create());
    $response = get('/admin/register');

    $response->assertStatus(200);
});

test('admin can register new user', function () {
    actingAs(User::factory()->admin()->create());
    $response = post('/admin/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'country' => Countries::first()->name->common,
        'state' => 'test state',
        'pin' => '1234',
    ]);

    $response->assertRedirect();
    assertDatabaseHas(User::class, ['email' => 'test@example.com']);
});
