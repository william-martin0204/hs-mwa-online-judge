<?php

test('welcome page can be displayed', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
