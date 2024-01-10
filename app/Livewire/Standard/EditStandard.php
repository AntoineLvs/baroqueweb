<?php

namespace App\Livewire\Standard;

use Livewire\Component;

class EditStandard extends Component
{
    public $name;
    public $standard;
    public $description;


    public function mount($standard)
    {

        $this->standard = $standard;

        $this->name = $standard->name;
        $this->description = $standard->description;

    }

    public function render()
    {
        return view('livewire.standard.edit-standard');
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500|nullable',
        ]);

        $this->standard->name = $this->name;
        $this->standard->description = $this->description;
        $this->standard->fresh();
        $this->standard->save();

        return redirect()
            ->route('standards.index')
            ->with('message', 'Standard wurde aktualisiert.');

    }
}
