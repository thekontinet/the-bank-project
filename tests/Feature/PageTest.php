<?php

test('it can render homepage', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('it can render other static pages', function () {
    $response = $this->get("/pages/home");
    $response->assertStatus(200);
});
