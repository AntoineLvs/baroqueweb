<?php

namespace App\Livewire\Tenant;

use App\Models\Tenant;
use App\Models\TenantType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $tenant_photo;

    public $tenant_photo_header;

    public $path;

    public $tenant_name;

    public $tenant_type;

    public $tenant_status;

    public $tenant_email;

    public $tenant_phone;

    public $tenant_website;

    public $tenant_street;

    public $tenant_zip;

    public $tenant_city;

    public $tenant_country;

    public $tenant_description;

    public $super;

    public function render()
    {
        //return view('livewire.tenant.edit');
        return view('livewire.tenant.edit', [
            'tenant_types' => TenantType::all(),
        ]);

    }

    public function mount()
    {
        $this->tenant_name = auth()->user()->Tenant->name;

        $this->tenant_type = auth()->user()->Tenant->tenant_type_id;

        $this->tenant_status = auth()->user()->Tenant->status;
        $this->tenant_email = auth()->user()->Tenant->email;
        $this->tenant_phone = auth()->user()->Tenant->phone;
        $this->tenant_website = auth()->user()->Tenant->website;
        $this->tenant_street = auth()->user()->Tenant->street;
        $this->tenant_zip = auth()->user()->Tenant->zip;
        $this->tenant_city = auth()->user()->Tenant->city;
        $this->tenant_country = auth()->user()->Tenant->country;
        $this->tenant_description = auth()->user()->Tenant->description;

    }

    public function updateTenant(Request $request)
    {

        $tenant = auth()->user()->Tenant;
        $tenant->name = $this->tenant_name;
        $tenant->tenant_type_id = $this->tenant_type;
        $tenant->status = $this->tenant_status;
        $tenant->email = $this->tenant_email;
        $tenant->phone = $this->tenant_phone;
        $tenant->website = $this->tenant_website;
        $tenant->street = $this->tenant_street;
        $tenant->zip = $this->tenant_zip;
        $tenant->city = $this->tenant_city;
        $tenant->country = $this->tenant_country;
        $tenant->description = $this->tenant_description;

        if ($this->tenant_photo) {
            $this->validate([
                'tenant_photo' => 'image|max:2048', // 1MB Max
            ]);

            //$tenant_id = auth()->user()->tenant_id;

            //$this->tenant_photo->store('/public/tenants/'. $tenant_id);
            //  $filename = $this->tenant_photo->store('tenants/'. $tenant_id);
            //  $tenant->photo = $filename;

            // Create Files

            $this->createPhoto($this->tenant_photo, $tenant);
        }

        if ($this->tenant_photo_header) {
            $this->validate([
                'tenant_photo_header' => 'image|max:2048', // 1MB Max
            ]);

            $this->createPhotoHeader($this->tenant_photo_header, $tenant);
        }

        $tenant->save();

        session()->flash('message', 'Tenant successfully updated.');

    }

    public function createPhoto($tenant_photo, $tenant)
    {

        //$filename = $file->store('documents', 's3-public');

        $user = Auth::user();

        // filename - docname_1773271717732.pdf
        $filename = pathinfo($this->tenant_photo->getClientOriginalName(), PATHINFO_FILENAME)
        .'_'.now()->timestamp.'.'.$this->tenant_photo->getClientOriginalExtension();

        // store public s3
        $this->tenant_photo->storeAs('/photos/'.$user->tenant_id.'/', $filename, 's3');

        //  ddd($filename);

        $tenant->photo = $filename;

    }

    public function createPhotoHeader($tenant_photo_header, $tenant)
    {
        $user = Auth::user();

        // filename - docname_1773271717732.pdf
        $filename = pathinfo($this->tenant_photo_header->getClientOriginalName(), PATHINFO_FILENAME)
        .'_'.now()->timestamp.'.'.$this->tenant_photo_header->getClientOriginalExtension();

        // store public s3
        $this->tenant_photo_header->storeAs('/photos/'.$user->tenant_id.'/', $filename, 's3');
        $tenant->photo_header = $filename;
    }
}
