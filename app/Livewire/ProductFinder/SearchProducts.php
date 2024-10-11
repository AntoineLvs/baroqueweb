<?php

namespace App\Livewire\ProductFinder;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductUnit;
use App\Models\Release;
use App\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SearchProducts extends Component
{
    public $searchTerm;

    public $tenant_id;
    public $products;
    public $listProducts;

    public $product_types;
    public $product_units;
    public $selectedProductType = null;
    public $mobileFilterDialogOpen = false;
    public $selectedProductUnit = null;

    function mount($products)
    {
        $this->products = $products;
        $this->listProducts = $products;
        $this->tenant_id = Auth::user()->tenant_id ?? null;
        $this->product_types = ProductType::withoutGlobalScope(TenantScope::class)->get();
        $this->selectedProductType = null;
        $this->product_units = ProductUnit::get();
    }

    public function updatedSelectedFilters($productTypeId = null, $productUnitId = null)
    {
        // Create the base query without the TenantScope
        $query = Product::withoutGlobalScope(TenantScope::class);

        // Apply the product type filter if selected
        if ($productTypeId) {
            $query->where('product_type_id', $productTypeId);
        }

        // Apply the product unit filter if selected
        if ($productUnitId) {
            $query->where('product_unit_id', $productUnitId);
        }

        // Obtain the filtered results
        $this->products = $query->get();
    }

    public function updatedSelectedProductType($productTypeId)
    {
        $this->updatedSelectedFilters($productTypeId, $this->selectedProductUnit);
    }

    public function updatedSelectedProductUnit($productUnitId)
    {
        $this->updatedSelectedFilters($this->selectedProductType, $productUnitId);
    }


    public function resetFilters()
    {
        // Reset the selected product type and reload all products
        $this->selectedProductType = null;
        $this->selectedProductUnit = null;
        $this->products = Product::withoutGlobalScope(TenantScope::class)->get();
    }



    public function toggleMobileFilterDialog()
    {
        $this->mobileFilterDialogOpen = !$this->mobileFilterDialogOpen;
    }

    public function render()
    {
        return view('livewire.product-finder.search-products', [
            'products' => $this->products,
            'product_types' => $this->product_types,
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

    public
    function search()
    {
        // This method gets called when the form is submitted.
        // Livewire's reactivity automatically updates the results.
    }
}
