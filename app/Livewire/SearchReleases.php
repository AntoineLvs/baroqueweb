<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Manufacturer;
use App\Models\Vehicle;
use App\Models\Engine;
use App\Models\Release;

class SearchReleases extends Component
{
    public $searchTerm;
    public $selectedManufacturer = null;
    public $selectedVehicle = null;
    public $selectedEngine = null;

    public function render()
    {


        $manufacturers = $this->selectedManufacturer ? Vehicle::where('id', $this->selectedManufacturer)->get() : [];
        $engines = $this->selectedVehicle ? Engine::where('id', $this->selectedVehicle)->get() : [];

        $releases = $this->getReleases();

        return view('livewire.search-releases', [

            'releases' => $releases,
        ]);
    }

    private function getReleases()
    {
        $query = Release::query();

        if ($this->selectedEngine) {
            $query->where('engine_id', $this->selectedEngine);
        }

        if ($this->selectedManufacturer) {
            $query->where('manufacturer_id', $this->selectedManufacturer);
        }


        if ($this->searchTerm) {
            $query->whereHas('engine', function ($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%');
            });
        }

        return $query->get();
    }

    public function search()
    {
        // This method gets called when the form is submitted.
        // Livewire's reactivity automatically updates the results.
    }


}
