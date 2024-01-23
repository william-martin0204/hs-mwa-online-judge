<?php

use App\Models\Tag;
use App\Models\User;

test('tags page is displayed', function () {

    $response = $this->get('/tags');

    $response->assertOk();
});

test('tag page is displayed', function () {

    $tag = Tag::factory()->create();

    $response = $this->get('/tags/' . $tag->slug);

    $response->assertOk();
});

test('tag page is not displayed for non-existing-tag', function () {

    $response = $this->get('/tags/no-slug-no-slug-no-slugasdasdasd');

    $response->assertNotFound();
});

test('admin can access create tag page', function () {

    $admin = createAdmin();

    $response = $this->actingAs($admin)->get('/admin/tags/create');

    $response->assertOk();
});

test('guest user cannot access create tag page', function () {

    $response = $this->get('/admin/tags/create');

    $response->assertRedirect('/login');
});

test('not admin user cannot access create tag page', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/admin/tags/create');

    $response->assertForbidden();
});

test('admin can create a tag', function () {

    $admin = createAdmin();

    $response = $this->actingAs($admin)->post('/admin/tags', [
        'name' => 'Test Tag',
        'description' => 'Test Description',
    ]);

    $response->assertRedirect('/admin/tags');

    $this->assertDatabaseHas('tags', [
        'name' => 'Test Tag',
        'slug' => 'test-tag',
        'description' => 'Test Description',
    ]);
});

test('guest user cannot create a tag', function () {

    $response = $this->post('/admin/tags', [
        'name' => 'Test Tag',
        'description' => 'Test Description',
    ]);

    $response->assertRedirect('/login');
});

test('not admin user cannot create a tag', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/admin/tags', [
        'name' => 'Test Tag',
        'description' => 'Test Description',
    ]);

    $response->assertForbidden();
});

test('admin can access edit tag page', function () {

    $admin = createAdmin();

    $tag = Tag::factory()->create();

    $response = $this->actingAs($admin)->get('/admin/tags/' . $tag->slug . '/edit');

    $response->assertOk();
});

test('guest user cannot access edit tag page', function () {

    $tag = Tag::factory()->create();

    $response = $this->get('/admin/tags/' . $tag->slug . '/edit');

    $response->assertRedirect('/login');
});

test('not admin user cannot access edit tag page', function () {

    $user = User::factory()->create();

    $tag = Tag::factory()->create();

    $response = $this->actingAs($user)->get('/admin/tags/' . $tag->slug . '/edit');

    $response->assertForbidden();
});

test('admin can update a tag', function () {

    $admin = createAdmin();

    $tag = Tag::factory()->create();

    $response = $this->actingAs($admin)->put('/admin/tags/' . $tag->slug, [
        'name' => 'Test Tag',
        'description' => 'Test Description',
    ]);

    $response->assertRedirect('/admin/tags');

    $this->assertDatabaseHas('tags', [
        'name' => 'Test Tag',
        'slug' => 'test-tag',
        'description' => 'Test Description',
    ]);
});

test('guest user cannot update a tag', function () {

    $tag = Tag::factory()->create();

    $response = $this->put('/admin/tags/' . $tag->slug, [
        'name' => 'Test Tag',
        'description' => 'Test Description',
    ]);

    $response->assertRedirect('/login');
});

test('not admin user cannot update a tag', function () {

    $user = User::factory()->create();

    $tag = Tag::factory()->create();

    $response = $this->actingAs($user)->put('/admin/tags/' . $tag->slug, [
        'name' => 'Test Tag',
        'description' => 'Test Description',
    ]);

    $response->assertForbidden();
});

test('admin can delete a tag', function () {

    $admin = createAdmin();

    $tag = Tag::factory()->create();

    $response = $this->actingAs($admin)->delete('/admin/tags/' . $tag->slug);

    $response->assertRedirect('/admin/tags');

    $this->assertDatabaseMissing('tags', [
        'name' => $tag->name,
        'slug' => $tag->slug,
        'description' => $tag->description,
    ]);
});

test('guest user cannot delete a tag', function () {

    $tag = Tag::factory()->create();

    $response = $this->delete('/admin/tags/' . $tag->slug);

    $response->assertRedirect('/login');
});

test('not admin user cannot delete a tag', function () {

    $user = User::factory()->create();

    $tag = Tag::factory()->create();

    $response = $this->actingAs($user)->delete('/admin/tags/' . $tag->slug);

    $response->assertForbidden();
});
