<?php

namespace App\Livewire\ProductFinder;

use App\Models\Product;
use App\Models\ProductType;
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
    public $selectedProductType = null;
    public $mobileFilterDialogOpen = false;

    function mount($products)
    {
        $this->products = $products;
        $this->listProducts = $products;
        $this->tenant_id = Auth::user()->tenant_id ?? null;
        $this->product_types = ProductType::withoutGlobalScope(TenantScope::class)->get();
        $this->selectedProductType = null;
    }

    public function updatedSelectedProductType($productTypeId)
    {
        // Filter products based on the selected product type
        if ($productTypeId) {
            $this->products = Product::withoutGlobalScope(TenantScope::class)
                ->where('product_type_id', $productTypeId)
                ->get();
        } else {
            // Show all products if no product type is selected
            $this->products = Product::withoutGlobalScope(TenantScope::class)->get();
        }
    }

    public function resetFilters()
    {
        // Reset the selected product type and reload all products
        $this->selectedProductType = null;
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
