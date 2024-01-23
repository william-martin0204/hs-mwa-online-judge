<?php

use App\Models\Problem;
use App\Models\User;
use Illuminate\Http\UploadedFile;

test('problems page is displayed', function () {
    $response = $this->get('/problems');

    $response->assertOk();
});

test('problem page is displayed', function () {

    $problem = Problem::factory()->create();

    $response = $this->get('/problems/' . $problem->slug);

    $response->assertOk();
});

test('problem page is not displayed for non-existing-problem', function () {

    $response = $this->get('/problems/no-slug-no-slug-no-slugasdasdasd');

    $response->assertNotFound();
});

test('admin can access create problem page', function () {

    $admin = createAdmin();

    $response = $this->actingAs($admin)->get('/admin/problems/create');

    $response->assertOk();
});

test('guest user cannot access create problem page', function () {

    $response = $this->get('/admin/problems/create');

    $response->assertRedirect('/login');
});

test('not admin user cannot access create problem page', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/admin/problems/create');

    $response->assertForbidden();
});

test('admin can create a problem', function () {

    $admin = createAdmin();

    $response = $this->actingAs($admin)->post('/admin/problems', [
        'title' => 'Test Problem',
        'description' => 'Test Description',
        'example_input' => 'Hello World',
        'example_output' => 'Hello World',
        'input_testcases' => UploadedFile::fake()->create('input.txt', 100),
        'output_testcases' => UploadedFile::fake()->create('output.txt', 100),
    ]);

    $problem = Problem::where('title', 'Test Problem')->first();

    // Check if problem is created with the correct data
    $this->assertNotNull($problem);
    $this->assertEquals('Test Problem', $problem->title);
    $this->assertEquals('Test Description', $problem->description);
    $this->assertEquals('Hello World', $problem->example_input);
    $this->assertEquals('Hello World', $problem->example_output);

    $response->assertRedirect('/admin/problems');
});

test('guest user cannot create a problem', function () {

    $response = $this->post('/admin/problems', [
        'title' => 'Test Problem',
        'description' => 'Test Description',
        'example_input' => 'Hello World',
        'example_output' => 'Hello World',
        'input_testcases' => UploadedFile::fake()->create('input.txt', 100),
        'output_testcases' => UploadedFile::fake()->create('output.txt', 100),
    ]);

    $response->assertRedirect('/login');
});

test('not admin user cannot create a problem', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/admin/problems', [
        'title' => 'Test Problem',
        'description' => 'Test Description',
        'example_input' => 'Hello World',
        'example_output' => 'Hello World',
        'input_testcases' => UploadedFile::fake()->create('input.txt', 100),
        'output_testcases' => UploadedFile::fake()->create('output.txt', 100),
    ]);

    $response->assertForbidden();
});

test('admin can access edit problem page', function () {

    $admin = createAdmin();

    $problem = Problem::factory()->create();

    $response = $this->actingAs($admin)->get('/admin/problems/' . $problem->slug . '/edit');

    $response->assertOk();
});

test('guest user cannot access edit problem page', function () {

    $problem = Problem::factory()->create();

    $response = $this->get('/admin/problems/' . $problem->slug . '/edit');

    $response->assertRedirect('/login');
});

test('not admin user cannot access edit problem page', function () {

    $user = User::factory()->create();

    $problem = Problem::factory()->create();

    $response = $this->actingAs($user)->get('/admin/problems/' . $problem->slug . '/edit');

    $response->assertForbidden();
});

test('admin can update a problem', function () {

    $admin = createAdmin();

    $problem = Problem::factory()->create();

    $response = $this->actingAs($admin)->put('/admin/problems/' . $problem->slug, [
        'title' => 'Test Problem',
        'description' => 'Test Description',
        'example_input' => 'Hello World',
        'example_output' => 'Hello World',
        'input_testcases' => UploadedFile::fake()->create('input.txt', 100),
        'output_testcases' => UploadedFile::fake()->create('output.txt', 100),
    ]);

    $problem = Problem::where('title', 'Test Problem')->first();

    // Check if problem is updated with the correct data
    $this->assertNotNull($problem);
    $this->assertEquals('Test Problem', $problem->title);
    $this->assertEquals('test-problem', $problem->slug);
    $this->assertEquals('Test Description', $problem->description);
    $this->assertEquals('Hello World', $problem->example_input);
    $this->assertEquals('Hello World', $problem->example_output);

    $response->assertRedirect('/admin/problems');
});

test('guest user cannot update a problem', function () {

    $problem = Problem::factory()->create();

    $response = $this->put('/admin/problems/' . $problem->slug, [
        'title' => 'Test Problem',
        'description' => 'Test Description',
        'example_input' => 'Hello World',
        'example_output' => 'Hello World',
        'input_testcases' => UploadedFile::fake()->create('input.txt', 100),
        'output_testcases' => UploadedFile::fake()->create('output.txt', 100),
    ]);

    $response->assertRedirect('/login');
});

test('not admin user cannot update a problem', function () {

    $user = User::factory()->create();

    $problem = Problem::factory()->create();

    $response = $this->actingAs($user)->put('/admin/problems/' . $problem->slug, [
        'title' => 'Test Problem',
        'description' => 'Test Description',
        'example_input' => 'Hello World',
        'example_output' => 'Hello World',
        'input_testcases' => UploadedFile::fake()->create('input.txt', 100),
        'output_testcases' => UploadedFile::fake()->create('output.txt', 100),
    ]);

    $response->assertForbidden();
});

test('admin can delete a problem', function () {

    $admin = createAdmin();

    $problem = Problem::factory()->create();

    $response = $this->actingAs($admin)->delete('/admin/problems/' . $problem->slug);

    $problem = Problem::where('title', 'Test Problem')->first();

    // Check if problem is deleted
    $this->assertNull($problem);

    $response->assertRedirect('/admin/problems');
});

test('guest user cannot delete a problem', function () {

    $problem = Problem::factory()->create();

    $response = $this->delete('/admin/problems/' . $problem->slug);

    $response->assertRedirect('/login');
});

test('not admin user cannot delete a problem', function () {

    $user = User::factory()->create();

    $problem = Problem::factory()->create();

    $response = $this->actingAs($user)->delete('/admin/problems/' . $problem->slug);

    $response->assertForbidden();
});
