<?php

namespace App\Livewire\Release;

use App\Models\Engine;
use App\Models\Manufacturer;
use App\Models\Release;
use App\Models\Standard;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EditRelease extends Component
{
    public $info;
    public $date;

    public $standards = [];
    public $standard_id = 1;
    public $engines = [];
    public $engine_id = 1;
    public $manufacturers = [];
    public $manufacturer_id = 1;

    public $release_from;

    public function mount($release)
    {

        $this->release = $release;

        $this->info = $release->info;
        $this->date = $release->date;
        $this->engine_id = $release->engine_id;
        $this->manufacturer_id = $release->manufacturer_id;
        $this->standard_id = $release->standard_id;

        $standards = Standard::all();
        $this->standards = $standards;

        $engines = Engine::all();
        $this->engines = $engines;

        $manufacturers = Manufacturer::all();
        $this->manufacturers = $manufacturers;

    }

    public function render()
    {
        return view('livewire.release.edit-release', [
            'standards' => $this->standards,
            'engines' => $this->engines,
            'manufacturers' => $this->manufacturers,
        ]);
    }

    public function submit()
    {
        $data = $this->validate([
            'info' => 'required|string|max:100',
            'date' => 'required|date',
            'engine_id' => 'required',
            'standard_id' => 'required',
            'manufacturer_id' => 'required',
            'release_from' => 'nullable',
        ]);

        $this->release->info = $this->info;
        $this->release->date = $this->date;
        $this->release->release_from = $this->release_from;
        $this->release->engine_id = $this->engine_id;
        $this->release->standard_id = $this->standard_id;
        $this->release->manufacturer_id = $this->manufacturer_id;

        $this->engine->fresh();
        $this->engine->save();

        return redirect()
            ->route('releases.index')
            ->with('message', 'Engine wurde aktualisiert.');

    }
}
