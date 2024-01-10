<?php

namespace App\Livewire\Release;

use App\Models\Engine;
use App\Models\Manufacturer;
use App\Models\Release;
use App\Models\Standard;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CreateRelease extends Component
{
    public $info;
    public $date;
    public $release_from;

    public $standards = [];
    public $standard_id = 1;
    public $engines = [];
    public $engine_id = 1;
    public $manufacturers = [];
    public $manufacturer_id = 1;


    public function mount()
    {
        $standards = Standard::all();
        $this->standards = $standards;

        $engines = Engine::all();
        $this->engines = $engines;

        $manufacturers = Manufacturer::all();
        $this->manufacturers = $manufacturers;

        $this->date = Carbon::now();
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

        $release = Release::create($data);

        $release->save();

        return redirect()
            ->route('releases.index')
            ->with('message', 'Freigabe wurde erstellt.');

    }

    public function render()
    {
        return view('livewire.release.create-release', [
            'standards' => $this->standards,
            'engines' => $this->engines,
            'manufacturers' => $this->manufacturers,
        ]);
    }
}
