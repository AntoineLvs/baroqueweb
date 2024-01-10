<?php

namespace App\Livewire\Team;

use App\Models\Tenant;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddTenant extends Component
{
    public $name = '';

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',

            //  'photo' => 'image|max:1024', // 1MB Max
            //'application' => 'file|mimes:pdf|max:10000',
        ]);

        //  $filename = $this->photo->store('photos', 's3-public');

        $user = Tenant::create([
            'name' => $this->name,

        ]);

        // filename - docname_1773271717732.pdf
        // $filename = pathinfo($this->application->getClientOriginalName(), PATHINFO_FILENAME)
        //     . '_' . now()->timestamp . '.' . $this->application->getClientOriginalExtension();
        //
        // // store private s3
        // $this->application->storeAs('/documents/' . $user->id . '/', $filename, 's3');
        //
        // // create document in db
        // $user->documents()->create([
        //     'type' => 'application',
        //     'filename' => $filename,
        //     'extension' => $this->application->getClientOriginalExtension(),
        //     'size' => $this->application->getSize(),
        // ]);

        // Generate Directory after Creation of Tenant
        // $path = public_path().'/tenants/' . $user->id;
        // Storage::makeDirectory($path, $mode = 0755, true, true);

        // Retrieve Storage storage_path('app/path/to')
        Storage::disk('local')->makeDirectory('tenants/'.$user->id);

        return redirect('/team');
    }

    public function render()
    {
        return view('livewire.team.add-tenant');
    }
}
