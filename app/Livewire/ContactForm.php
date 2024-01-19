<?php

namespace App\Livewire;

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;

    public $email;

    public $message;

    public function submitContact()
    {
        // Reset errors
        $this->resetErrorBag();

        ContactController::store(new Request([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]));

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
