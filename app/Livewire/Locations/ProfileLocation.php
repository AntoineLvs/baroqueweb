<?php

namespace App\Livewire\Locations;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\Project;
use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

use App\Scopes\TenantScope;


class ProfileLocation extends Component
{
  use WithPagination;

  public $location;
  public $locations;

  public $products;
  public $services;

  public $product;
  public $location_id;


  public function mount($location_id, $location)
{
    $this->location = $location;
    $this->location_id = $location_id;

}


  public function render()
  {
      return view('livewire.locations.profile-location', [
        'location' => $this->location,
 
      ]);
    }

}
