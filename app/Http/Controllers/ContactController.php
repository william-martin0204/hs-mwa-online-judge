<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public static function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'min:10', 'max:500'],
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        // Add a flash message
        session()->flash('success_notification', 'Thank you for your feedback!');
    }
}
