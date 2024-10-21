<?php

namespace App\Livewire\Client;

use App\Models\Client;
use App\Models\ClientType;
use Livewire\Component;

class CreateClient extends Component
{
    public $client;
    public $client_types;

    public $name;
    public $description;
    public $status;
    public $client_type_id;
    public $active = 0;

    public function mount()
    {
        $this->client_types = ClientType::all();
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'string|max:500|nullable',
            'description' => 'string|max:500|nullable',
            'status' => 'string|max:500|nullable',
            'client_type_id' => 'string|max:100|nullable',

        ]);

        $client = Client::create($data);

        $client->save();

        return redirect()
            ->route('clients.index')
            ->with('message', 'Client was created.');
    }

    public function render()
    {
        return view('livewire.client.create-client', [
            'client_types' => $this->client_types,
        ]);
    }
}
