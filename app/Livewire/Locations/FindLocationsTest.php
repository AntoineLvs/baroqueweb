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

class FindLocationsTest extends Component
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


    public $showFilters = false;

    public $toggleTableValue = false;
    public $toggleMapValue = false;
    public $tableDiv = 'w-full';
    public $mapDiv = 'w-full';

    public $justifyContent = 'justify-center';
    public $showResults = false;

    public $filters = [
        'search' => '',
        'blend_min' => null,
        'selected_product' => '',
        'selected_service' => '',


    ];

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
    }



    public function toggleShowFilters()
    {

        $this->showFilters = !$this->showFilters;
    }


    public function resetFilters()
    {
        $this->reset('filters');
    }

    // Here we take every locations that are active and online, and then, if there is a research, we apply some filter on these locations. If there is also some filters selected, 
    // it returns locations that match. This function also dispatch an event whenever there is results, to give the map lng/lat, to be able to zoom on it if needed
    public function getRowsProperty()
    {
        return $this->cache(function () {
            if (
                empty($this->filters['search']) &&
                (is_null($this->filters['blend_min']) || $this->filters['blend_min'] === '') &&
                (is_null($this->filters['selected_product']) || $this->filters['selected_product'] === '') &&
                (is_null($this->filters['selected_service']) || $this->filters['selected_service'] === '')
            ) {
                // Retourner une collection vide si aucun filtre n'est appliqué
                return new Collection();
            }
            $query = Location::query();

            $query->withoutGlobalScope(TenantScope::class);
            $query->where('active', 1)->where('status', 2);

            // Filtrage basé sur les filtres existants
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
                foreach ($query->get() as $location) {
                    $this->dispatch('showLocationOnMap', [
                        'latitude' => $location->lat,
                        'longitude' => $location->lng,
                    ]);
                }
            })->when(isset($this->filters['blend_min']) && $this->filters['blend_min'] !== '', function ($query) {
                $productIds = Product::where('blend_percent', '>=', $this->filters['blend_min'])
                    ->pluck('id');

                if ($productIds->isEmpty()) {
                    return $query->whereRaw('1 = 0');
                }

                return $query->where(function ($query) use ($productIds) {
                    foreach ($productIds as $productId) {
                        $query->orWhereRaw("json_contains(product_id, '$productId')");
                    }
                });
            });

            if (isset($this->filters['selected_product']) && $this->filters['selected_product'] !== '') {
                $productIds = Product::where('product_type_id', '=', $this->filters['selected_product'])
                    ->pluck('id');

                if ($productIds->isEmpty()) {
                    return $query->whereRaw('1 = 0');
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

            if (isset($this->filters['selected_service']) && $this->filters['selected_service'] !== '') {
                $serviceIds = Service::where('base_service_id', '=', $this->filters['selected_service'])
                    ->pluck('id');

                if ($serviceIds->isEmpty()) {
                    return $query->whereRaw('1 = 0');
                }

                $query->where(function ($query) use ($serviceIds) {
                    foreach ($serviceIds as $serviceId) {
                        $query->orWhereRaw("json_contains(service_id, '$serviceId')");
                    }
                });
            }

            $sortedQuery = $query->orderBy($this->sortColumn, $this->sortDirection);
            $filteredQuery = $this->applyPagination($this->applySorting($sortedQuery));
            $this->toggleResults();
            $locationsGeoJson = [
                'type' => 'FeatureCollection',
                'features' => $filteredQuery->map(function ($location) {
                    return [
                        'type' => 'Feature',
                        'geometry' => [
                            'type' => 'Point',
                            'coordinates' => [$location->lng, $location->lat],
                        ],
                        'properties' => [
                            'title' => $location->name,
                            'description' => $location->description,
                            'id' => $location->id,
                            'opening_start' => $location->opening_start,
                            'opening_end' => $location->opening_end,
                            'active' => $location->active,
                            'product_id' => $location->product_id,
                        ]
                    ];
                })->toArray()
            ];

            return $filteredQuery;
        });
    }


    public function toggleResults()
    {
        $this->showResults = !$this->showResults;
    }

    public function showOnMap($locationId)
    {
        $this->toggleResults();
        //Here we take the location's data (lng/lat), to send them to the map, to permit to zoom on it
        $location = Location::find($locationId);

        if ($location) {
            $this->dispatch('showLocationOnMap', [
                'latitude' => $location->lat,
                'longitude' => $location->lng,
            ]);
        } else {
        }
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
        $locations = $this->getRowsProperty();

        // Vérifiez si $locations est une instance de LengthAwarePaginator
        if ($locations instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $items = $locations->items();
        } else {
            $items = $locations; // Supposons que $locations est déjà un tableau
        }

        return view('livewire.locations.find-locations-test', [
            'locations' => $items,
        ]);
    }
}
