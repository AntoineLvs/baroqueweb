<?php

namespace App\Livewire\Standard;

use App\Models\Standard;
use Livewire\Component;

class CreateStandard extends Component
{
    public $name;

    public $description;

    public function mount()
    {
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500|nullable',
        ]);

        $standard = Standard::create($data);

        $standard->save();

        return redirect()
            ->route('standards.index')
            ->with('message', 'Standard wurde erstellt.');

    }

    public function render()
    {
        return view('livewire.standard.create-standard');
    }
}
