<?php

namespace App\Livewire\ProductFinder;

use App\Models\Product;
use App\Models\Release;
use App\Scopes\TenantScope;
use Livewire\Component;

class SearchProducts extends Component
{
    public $searchTerm;

    public $products;

    function mount($products)
    {
        $this->products = $products;
    }



    function render()
    {


        $products = Product::withoutGlobalScope(TenantScope::class)->get();

        return view('livewire.product-finder.search-products', [

            'products' => $products,
        ]);
    }

    private
    function getReleases()
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

    public
    function search()
    {
        // This method gets called when the form is submitted.
        // Livewire's reactivity automatically updates the results.
    }


}
