<?php

namespace App\Livewire\Client;

use App\Models\ClientType;
use App\Models\Project;
use App\Scopes\TenantScope;
use Livewire\Component;

class ShowClient extends Component
{
    public $client;

    public $name;
    public $description;
    public $status;
    public $client_type_id;
    public $client_type;

    public $client_types;

    public $projects;

    public function mount($client)
    {

        $this->client = $client;

        $this->name = $client->name;
        $this->description = $client->description;
        $this->status = $client->status;
        $this->client_type_id = $client->client_type_id;

        $this->client_type = ClientType::find($client->client_type_id);

        $this->projects = Project::withoutGlobalScope(TenantScope::class)->where('client_id', $client->id)->get();
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'string|max:500|nullable',
            'description' => 'string|max:500|nullable',
            'status' => 'string|max:500|nullable',
            'client_type_id' => 'string|max:100|nullable',

        ]);

        $this->client->name = $this->name;
        $this->client->description = $this->description;
        $this->client->status = $this->status;
        $this->client->client_type_id = $this->client_type_id;

        $this->client->fresh();
        $this->client->save();

        return redirect()
            ->route('clients.show', $this->client)
            ->with('message', 'Client has been updated.');
    }
    public function render()
    {
        return view('livewire.client.show-client');
    }
}
