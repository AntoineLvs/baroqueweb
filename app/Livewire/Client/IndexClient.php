<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Livewire\Component;



class IndexClient extends Component
{

    protected $listeners = [
        'entityActivated',
        'entityDeactivated',
    ];

    public function clientActivated()
    {
        session()->flash('message', 'Your request has been registered. Your Client will be checked by our team soon.');
    }

    public function clientDeactivated()
    {
        session()->flash('message', 'The client has been deactivated. Please be aware that it will take some time before it can be desactivated on map.');
    }

    public function mount()
    {
        // Mount something
    }
    public function render()
    {

        $clients = Client::latest()->paginate(25);

        return view('livewire.client.index-client', [
            'clients' => $clients,
        ]);
    }
}
