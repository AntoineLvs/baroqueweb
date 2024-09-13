<?php

namespace App\Livewire\Auth;

use App\Models\Location;
use App\Models\Tenant;
use App\Models\User;
use App\Models\TenantType;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public $phone = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public $checkbox;

    public function mount()
    {
        $this->tenant_types = TenantType::where('id',1)->get();

    }

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'company' => ['required', 'string', 'unique:tenants,name'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['nullable', 'string'],
            'tenant_type_id' => ['required'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
            'checkbox' => 'required',
        ]);

        $tenant = Tenant::create([
            'name' => $this->company,
            'tenant_type_id' => $this->tenant_type_id,
        ]);

        $tenant->save();


        // Storage::disk('local')->makeDirectory('tenants/'.$tenant->id);

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'phone' => $this->phone,
            'role' => 'tenant_admin',
            'company' => $this->company,
            'password' => Hash::make($this->password),
            'tenant_id' => $tenant->id,
        ]);
        //added
        $tenant->fresh();

        $location = Location::create([
            'tenant_id' => $tenant->id, 
            'name' => $tenant->name,
            'description' => 'This is an example of the ideal location. You can create a new location, by taking care of filling all the needed informations, as you can see on this example.',
            'address' => 'Rathausstraße 15',
            'city' => 'Berlin',
            'zipcode' => '10178',
            'country' => 'Germany',
            'distance' => '',
            'opening_start' => '06:00',
            'opening_end' => '23:00',
            'opening_info' => 'Example opening informations',
            'active' => '0',
            'verified' => '0',
            'status' => '0',
            'lng' => '13.408226',
            'lat' => '52.518520',
            'location_type_id' => '1',
            'service_id' => '[]',
            'product_id' => '[]',
        ]);

    
        $location->save();

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
