<?php

use function Pest\Laravel\post;

it('can create new account', function () {
    $response = post('/accounts', [
        'user_id' => 1,
        'type' => 'savings'
    ]);

    $response->assertRedirect();
});
