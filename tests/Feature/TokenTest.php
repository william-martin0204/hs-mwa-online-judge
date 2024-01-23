<?php

use App\Models\User;

test('users can see tokens page', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/tokens');

    $response->assertOk();
});

test('guest users cannot see tokens page', function () {

    $response = $this->get('/tokens');

    $response->assertRedirect('/login');
});

test('users can create a token', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/tokens', [
        'name' => 'Test Token',
    ]);

    $response->assertSessionHas('success_token', true);

    $response->assertRedirect('/tokens');
});

test('guest users cannot create a token', function () {

    $response = $this->post('/tokens', [
        'name' => 'Test Token',
    ]);

    $response->assertRedirect('/login');
});
