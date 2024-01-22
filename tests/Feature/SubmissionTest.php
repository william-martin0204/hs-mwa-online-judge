<?php

use App\Models\Problem;
use App\Models\Submission;
use App\Models\User;

test('submissions page is displayed', function () {

    $response = $this->get('/submissions');

    $response->assertOk();
});

test('user can make a submission', function () {

    $user = User::factory()->create();

    $problem = Problem::factory()->create();

    $response = $this->actingAs($user)->post('/submissions', [
        'problem_id' => $problem->id,
        'language' => 'C++',
        'code' => '#include <iostream>',
    ]);

    $response->assertRedirect('/submissions');
});

test('guest user cannot make a submission', function () {

    $problem = Problem::factory()->create();

    $response = $this->post('/submissions', [
        'problem_id' => $problem->id,
        'language' => 'C++',
        'code' => '#include <iostream>',
    ]);

    $response->assertRedirect('/login');
});

test('submission page is displayed for creator user', function () {

    $user = User::factory()->create();
    $problem = Problem::factory()->create();

    $submission = Submission::factory()->create([
        'user_id' => $user->id,
        'problem_id' => $problem->id,
    ]);

    $response = $this->actingAs($user)->get('/submissions/' . $submission->id);

    $response->assertOk();
});

test('submission page is displayed for admin user', function () {

    $admin = createAdmin();

    $user = User::factory()->create();
    $problem = Problem::factory()->create();

    $submission = Submission::factory()->create([
        'user_id' => $user->id,
        'problem_id' => $problem->id,
    ]);

    $response = $this->actingAs($admin)->get('/submissions/' . $submission->id);

    $response->assertOk();
});

test('submission page is not displayed for guest user', function () {

    $user = User::factory()->create();
    $problem = Problem::factory()->create();

    $submission = Submission::factory()->create([
        'user_id' => $user->id,
        'problem_id' => $problem->id,
    ]);

    $response = $this->get('/submissions/' . $submission->id);

    $response->assertRedirect('/login');
});

test('submission page is not displayed for other user', function () {

    $user = User::factory()->create();
    $problem = Problem::factory()->create();

    $submission = Submission::factory()->create([
        'user_id' => $user->id,
        'problem_id' => $problem->id,
    ]);

    $user2 = User::factory()->create();
    $response = $this->actingAs($user2)->get('/submissions/' . $submission->id);

    $response->assertForbidden();
});
