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

class FindLocationsPublic extends Component
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

    public $toggleTable = false;
    public $toggleMap = false;
    public $tableDiv = 'w-full';
    public $mapDiv = 'w-full';

    public $justifyContent = 'justify-center';


    public $filters = [
        'search' => '',
        'blend_min' => null,
        'selected_product' => '',
        'selected_service' => '',


    ];


    public function toggleMap()
    {
        $this->toggleMap = !$this->toggleMap;

        if ($this->toggleMap) {
            $this->justifyContent = 'justify-start';
            $this->tableDiv = 'w-0 hidden';
        } else {
            $this->justifyContent = 'justify-center';
            $this->tableDiv = 'w-full';
        }
    }

    public function toggleTable()
    {
        $this->toggleTable = !$this->toggleTable;

        if ($this->toggleTable) {
            $this->justifyContent = 'justify-end';
            $this->tableDiv = 'w-full';
            $this->mapDiv = 'w-0 hidden';
        } else {
            $this->justifyContent = 'justify-center';
            $this->tableDiv = 'w-full';
            $this->mapDiv = 'w-full';
        }
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
        $this->product_types = ProductType::all();
        $this->base_services = BaseService::all();

        $this->currentTime = now(config('app.timezone'))->toTimeString();
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = !$this->showFilters;
    }


    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            $query = Location::query();

            $query->withoutGlobalScope(TenantScope::class);

            // $query->where('active', 1)
            //     ->where('status', 2);


            // Filtering based on existing 
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
                // foreach ($query->get() as $location) {
                //     $this->emit('showLocationOnMap', [
                //         'latitude' => $location->lat,
                //         'longitude' => $location->lng,
                //     ]);
                // }
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
            $filteredQuery = $this->applyPagination($this->applySorting($query));

            $numberOfResults = $filteredQuery->count();

            // if ($numberOfResults === 1) {
            //     $location = $filteredQuery->first();
            //     $this->dispatchBrowserEvent('searchResultsUpdated', [
            //         'latitude' => $location->lat,
            //         'longitude' => $location->lng,
            //     ]);
            // }

            return $filteredQuery;
        });
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


    // public function exportLocation($locationId)
    // {

    //     $location = Location::find($locationId);

    //     $data = [
    //         'geometry' => [
    //             'coordinates' => [$location->lng, $location->lat],
    //             'type' => 'Point'
    //         ],
    //         'type' => 'Feature',
    //         'properties' => [
    //             'id' => $location->id,
    //             'tenant_id' => $location->tenant_id,
    //             'name' => $location->name,
    //             'description' => $location->description,
    //             'address' => $location->address,
    //             'city' => $location->city,
    //             'zipcode' => $location->zipcode,
    //             'country' => $location->country,
    //         ]
    //     ];

    //     // Convert in JSON format
    //     $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    //     // Download in a file
    //     $filePath = storage_path('app/location_data.json'); // File location
    //     file_put_contents($filePath, $jsonData);

    //     // Redirect to the file
    //     return response()->download($filePath);
    // }



    public function showOnMap($locationId)
    {
        $location = Location::find($locationId);

        // if ($location) {
        //     $this->emit('showLocationOnMap', [
        //         'latitude' => $location->lat,
        //         'longitude' => $location->lng,
        //     ]);
        // } else {
        //     // Gérer le cas où l'emplacement n'est pas trouvé
        // }
    }


    public function render()
    {
        $locations = $this->getRowsProperty();

        return view('livewire.locations.find-locations-public', [
            'locations' => $locations->items(),
        ]);
    }
}
