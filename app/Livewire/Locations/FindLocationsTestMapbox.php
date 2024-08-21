<?php

namespace App\Livewire\Locations;

use Livewire\Component;
use App\Models\Location;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Carbon;
use App\Traits\WithCachedRows;
use App\Traits\WithPerPagePagination;
use App\Traits\WithSorting;
use App\Models\BaseService;
use App\Models\ProductType;
use App\Scopes\TenantScope;
use Livewire\Attributes\On;
use TallStackUi\Facades\TallStackUi;
use Illuminate\Support\Collection;

class FindLocationsTestMapbox extends Component
{
    use WithPerPagePagination, WithSorting, WithCachedRows;

    public string $sortColumn = 'name';
    public string $sortDirection = 'asc';

    public $product_types;
    public $base_services;
    public $rowsQuery;

    public $opening_start;
    public $opening_end;
    public $isOpen;

    public $currentTime;

    public $newLocations;
    public $locations;

    public $showResultClass = false;
    public $count;

    public $mobile;
    public $hasResults;

    public $northEastLat;
    public $northEastLng;
    public $southWestLat;
    public $southWestLng;

    public $highlighted;
    public $isHvo100 = true;
    public $isHvoBlend = true;
    public $detail = '';


    public $filters = [
        'search' => '',
        'blend_min' => null,
        'selected_product' => '',
        'selected_service' => '',


    ];




    public function toggleProduct($product)
    {
        if ($product === 'HVO100') {
            $this->isHvo100 = !$this->isHvo100;
        } elseif ($product === 'HVOBlend') {
            $this->isHvoBlend = !$this->isHvoBlend;
        }

        if ($this->isHvo100 && $this->isHvoBlend) {
            $this->filters['selected_product'] = ''; // select both (display all locations)
        } elseif ($this->isHvo100) {
            $this->filters['selected_product'] = ['1']; // filtre by HVO 100
        } elseif ($this->isHvoBlend) {
            $this->filters['selected_product'] = ['2']; // filter by HVO Blend
        } else {
            $this->filters['selected_product'] = []; // no selection (no results)
        }

        $this->getRowsProperty();
    }

    public function updatedFilters()
    {
        $this->dispatch('getVisibleLocations');
    }



    public function sortByColumn($column): void
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function mount()
    {
        //Get product_types and base_services to show on the table / currentTime because we need to compare the opnening hours from the locations, from the current time of the laptop
        $this->product_types = ProductType::withoutGlobalScope(TenantScope::class)->get();
        $this->base_services = BaseService::withoutGlobalScope(TenantScope::class)->get();

        $this->currentTime = now(config('app.timezone'))->toTimeString();
        $this->getRowsProperty();
    }


    public function resetFilters()
    {
        $this->reset('filters');
        $this->filters['selected_product'] = ''; // select both (display all locations)
        $this->northEastLat = null;
        $this->northEastLng = null;
        $this->southWestLat = null;
        $this->southWestLng = null;
        $this->isHvo100 = true;
        $this->isHvoBlend = true;
        $this->getRowsProperty();
    }

    // Here we take every locations that are active and online, and then, if there is a research, we apply some filter on these locations. If there is also some filters selected, 
    // it returns locations that match. This function also dispatch an event whenever there is results, to give the map lng/lat, to be able to zoom on it if needed
    public function getRowsProperty()
    {
        return $this->cache(function () {
            $query = Location::query();
            $query->limit(10);

            $query->withoutGlobalScope(TenantScope::class);
            $query->where('active', 1)->where('status', 2);

            $query->when($this->filters['search'], function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhereHas('tenant', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhere('city', 'like', '%' . $search . '%')
                        ->orWhere('zipcode', 'like', '%' . $search . '%')
                        ->orWhere(function ($query) use ($search) {
                            $productIds = Product::where('name', 'like', '%' . $search . '%')->pluck('id');

                            $query->where(function ($query) use ($productIds) {
                                foreach ($productIds as $productId) {
                                    $query->orWhereRaw("json_contains(product_id, '$productId')");
                                }
                            });
                        })
                        ->orWhere(function ($query) use ($search) {
                            $serviceIds = Service::where('name', 'like', '%' . $search . '%')->pluck('id');

                            $query->where(function ($query) use ($serviceIds) {
                                foreach ($serviceIds as $serviceId) {
                                    $query->orWhereRaw("json_contains(service_id, '$serviceId')");
                                }
                            });
                        });
                });

                $numberOfResults = $query->count();
                if ($numberOfResults === 1) {
                    $location = $query->first();
                    $this->highlighted = $location->id;
                }
            });

            if (isset($this->filters['selected_product']) && $this->filters['selected_product'] !== '') {
                $productIds = Product::where('product_type_id', '=', $this->filters['selected_product'])
                    ->pluck('id');

                if ($productIds->isEmpty()) {
                    $locationIds = [];
                    $this->sendToMap($locationIds);
                    $this->locations = [];
                    $this->hasResults = false;
                    $this->showResults();
                    return;
                }

                $query->where(function ($query) use ($productIds) {
                    foreach ($productIds as $productId) {
                        $query->orWhereRaw("json_contains(product_id, '$productId')");
                    }
                });
            }

            if (isset($this->filters['is_open']) && $this->filters['is_open']) {
                $currentTime = now();
                $query->where('opening_start', '<=', $currentTime->now(config('app.timezone'))->format('H:i:s'))
                    ->where('opening_end', '>=', $currentTime->now(config('app.timezone'))->format('H:i:s'));
            }

            // Filtrer par les limites géographiques
            if ($this->northEastLat && $this->northEastLng && $this->southWestLat && $this->southWestLng) {
                $query->whereBetween('lat', [$this->southWestLat, $this->northEastLat])
                    ->whereBetween('lng', [$this->southWestLng, $this->northEastLng]);
            }


            // Appliquer le tri
            $sortedQuery = $query->orderBy($this->sortColumn, $this->sortDirection);

            // Récupérer les données sans pagination
            $filteredQuery = $sortedQuery->get();

            $numberOfResults = $filteredQuery->count();

            if ($numberOfResults === 1) {
                $location = $filteredQuery->first();
                $this->dispatch('searchResultsUpdated', [
                    'latitude' => $location->lat,
                    'longitude' => $location->lng,
                ]);
            }

            $locationIds = $filteredQuery->pluck('id');
            $this->sendToMap($locationIds);

            $this->locations = $filteredQuery;

            $this->count++;
            if ($this->count > 1) {
                $this->showResults();
            }

            $this->hasResults = true;

            return $filteredQuery;
        });
    }

    #[On('MobileMode')]
    public function hideResults()
    {
        $this->mobile = true;
        $this->showResultClass = false;
    }

    #[On('DesktopMode')]
    public function DesktopMode()
    {
        $this->mobile = false;
    }

    public function sendToMap($locationIds)
    {
        $this->newLocations = Location::withoutGlobalScope(TenantScope::class)
            ->limit(10)
            ->where('active', 1)
            ->whereIn('id', $locationIds)
            ->pluck('id')
            ->toArray();

        $this->dispatch('geoJsonLocationOnMap', json_encode($this->newLocations));
    }

    public function toggleResults()
    {

        $this->showResultClass = !$this->showResultClass;
    }

    #[On('showResults')]
    public function showResults()
    {

        $this->showResultClass = true;
    }


    public function showOnMap($locationId)
    {
        if ($this->mobile) {
            $this->showResultClass = false;
        }

        $location = Location::find($locationId);

        if ($location) {
            $this->dispatch('showLocationOnMap', [
                'latitude' => $location->lat,
                'longitude' => $location->lng,
            ]);
        } else {
        }
    }

    public function showDetails($locationId)
    {
        $this->detail = $locationId;
    }

    public function openOnMap($locationId)
    {
        $location = Location::withoutGlobalScope(TenantScope::class)->findOrFail($locationId);
        $address = $location->address . ' ' . $location->city . ' ' . $location->zipcode . ' ' . $location->country;
        $this->dispatch('openLocationOnMap', $address);
    }


    #[On('highlightLocation')]
    public function highlightLocation($locationId)
    {
        $this->showResults();
        $highlightedLocation = Location::withoutGlobalScope(TenantScope::class)->findOrFail($locationId);

        $this->highlighted = $highlightedLocation->id;

        $query = Location::query();

        $query->withoutGlobalScope(TenantScope::class);
        $query->where('active', 1)->where('status', 2);

        // Applicate the product filter if selected
        if (isset($this->filters['selected_product']) && $this->filters['selected_product'] !== '') {
            $productIds = Product::where('product_type_id', '=', $this->filters['selected_product'])
                ->pluck('id');

            if ($productIds->isEmpty()) {
                // if no product matches the filter, return only the highlighted location
                $this->locations = [$highlightedLocation];
                return;
            }

            // Applicate the product filter when requested
            $query->where(function ($query) use ($productIds) {
                foreach ($productIds as $productId) {
                    $query->orWhereRaw("json_contains(product_id, '$productId')");
                }
            });
        }




        // Get the other locations filtered, excluding the highlighted location
        $otherLocations = $query->where('id', '<>', $locationId)->get();

        // Fusion the highlighted location with the other locations
        $this->locations = collect([$highlightedLocation])->merge($otherLocations);
    }

    #[On('retrieveMapDatas')]
    public function retrieveMapDatas($northEastLat, $northEastLng, $southWestLat, $southWestLng)
    {
        $this->northEastLat = $northEastLat;
        $this->northEastLng = $northEastLng;
        $this->southWestLat = $southWestLat;
        $this->southWestLng = $southWestLng;

        $this->getRowsProperty();
    }

    #[On('searchInArea')]
    public function searchInArea()
    {
        $this->dispatch('getVisibleLocations');
    }

    #[On('updateLocationsInBounds')]
    public function updateLocationsInBounds($northEastLat, $northEastLng, $southWestLat, $southWestLng)
    {
        $this->showResults();

        $query = Location::query();
        $query->withoutGlobalScope(TenantScope::class);
        $query->where('active', 1)->where('status', 2);

        // Add the filter for geographic boundaries
        $query->whereBetween('lat', [$southWestLat, $northEastLat])
            ->whereBetween('lng', [$southWestLng, $northEastLng]);

        // Get the filtered locations
        $this->locations = $query->get();

        // Update the map with the filtered locations
        $this->sendToMap($this->locations->pluck('id'));
    }




    public function getServices($locationId)
    {
        $location = Location::withoutGlobalScope(TenantScope::class)->findOrFail($locationId);
        return $location->getServices();
    }

    public function getProducts($locationId)
    {
        $location = Location::withoutGlobalScope(TenantScope::class)->findOrFail($locationId);
        return $location->getProducts();
    }

    public function updatedCurrentTime($value)
    {
        $this->currentTime = $value;
    }




    public function render()
    {
        return view('livewire.locations.find-locations-test-mapbox');
    }
}
