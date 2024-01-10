<?php

namespace App\Livewire\Auth;

use App\Models\Tenant;
use App\Models\TenantType;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $company = '';

    public $tenant_type_id = 1;

    public $tenant_types;

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function mount()
    {
        $this->tenant_types = TenantType::all();

    }

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'company' => ['required', 'string', 'unique:tenants,name'],
            'email' => ['required', 'email', 'unique:users'],
            'tenant_type_id' => ['required'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $tenant = Tenant::create([
            'name' => $this->company,
            'tenant_type_id' => $this->tenant_type_id,
        ]);

        $tenant->save();
        //ddd($tenant);

        // todo storage

        Storage::disk('local')->makeDirectory('tenants/'.$tenant->id);

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'role' => 'admin',
            'company' => $this->company,
            'password' => Hash::make($this->password),
            'tenant_id' => $tenant->id,
        ]);
        //added
        $tenant->fresh();

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
