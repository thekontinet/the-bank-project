<?php

test('it can render homepage', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('it can render other static pages', function () {
    $files = array_slice(scandir(resource_path('views/page')), 2);
    foreach($files as $file){
        $page = str_replace('.blade.php', '', $file);
        $response = $this->get("/pages/$page");
        $response->assertStatus(200);
    }
});
