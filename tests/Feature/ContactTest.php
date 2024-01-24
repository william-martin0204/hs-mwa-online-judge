<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

test('send contact form', function () {

    ContactController::store(new Request([
        'name' => 'John Doe',
        'email' => 'johndoe@email.com',
        'message' => 'Hello World',
    ]));

    $contact = Contact::where('name', 'John Doe')->first();

    $this->assertNotNull($contact);
    $this->assertEquals('John Doe', $contact->name);
    $this->assertEquals('johndoe@email.com', $contact->email);
    $this->assertEquals('Hello World', $contact->message);
});

test('admin can see contacts', function () {

    $admin = createAdmin();

    $this->actingAs($admin)
        ->get('/admin/contacts')
        ->assertSee('Contacts');
});

test('guest user cannot see contacts', function () {

    $this->get('/admin/contacts')
        ->assertRedirect('/login');
});

test('not admin user cannot see contacts', function () {

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/contacts')
        ->assertForbidden();
});
