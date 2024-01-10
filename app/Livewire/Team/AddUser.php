<?php

namespace App\Livewire\Team;

use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddUser extends Component
{
    use WithFileUploads;

    public $name = '';

    public $email = '';

    public $department = '';

    //public $photo;
    // public $application;
    public $status = 1;

    public $role = 'Member';

    public $tenant = '';

    public $tenants;

    public $super;

    public $now;

    public ?string $select = null;

    public function mount()
    {
        if (session()->has('tenant_id')) {
            $this->super = false;
            $tenant = session('tenant_id');

        } else {
            $this->super = true;
            $this->tenants = Tenant::all();
        }

        $this->now = Carbon::now()->toDateTimeString();

        //  $count = Product::where('tenant_id','=',$id)->count();

    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',

            'email' => 'required|email|unique:users',
            'department' => 'nullable|string',
            'status' => 'required|boolean',
            'role' => 'required|string',
            //'photo' => 'image|max:1024', // 1MB Max
            //'application' => 'file|mimes:pdf|max:10000',
        ]);

        //  $filename = $this->photo->store('photos', 's3-public');

        $user = User::create([
            'name' => $this->name,

            'email' => $this->email,
            //'department' => $this->department,
            'tenant_id' => $this->tenant,
            'status' => $this->status,
            'role' => $this->role,
            //'photo' => $filename,
            'password' => bcrypt(Str::random(16)),

        ]);

        $user->email_verified_at = $this->now;
        $user->save();

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

        return redirect('/team');
    }

    public function render()
    {
        return view('livewire.team.add-user');
    }
}
