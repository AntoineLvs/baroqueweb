<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactForm extends Component
{
    public $first_name;
    public $last_name;
    public $company;
    public $email;
    public $message;
    public $check;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'company' => 'nullable|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
        'check' => 'required',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function submitForm()
    {
        $validatedData = $this->validate();

        Mail::to('info@xtl-freigaben.de')->send(new ContactMail($validatedData));

        session()->flash('success', 'Vielen Dank für Ihre Nachricht! Wir haben Ihre E-Mail erhalten und werden uns bald bei Ihnen melden.');

        $this->reset();
    }
}
