<?php

namespace App\Livewire\ProductFinder;

use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\ProductUnit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mail;
use App\Mail\NewProductRequest;
use App\Scopes\TenantScope;

class ProductShopPage extends Component
{
    public $product;
    public $tenant_id;
    public $products;
    public $product_units;
    public $selected_unit = 1;
    public $quantity = 0;


    public function mount(Product $product)
    {
        $this->product = $product;
        $this->tenant_id = Auth::user()->tenant_id;
        $this->products = Product::withoutGlobalScope(TenantScope::class)
            ->where('id', '<>', $this->product->id)
            ->take(4)
            ->get();

        $this->product_units = ProductUnit::withoutGlobalScope(TenantScope::class)->get();
    }

    public function updatedSelectedUnit($value)
    {
        $this->selected_unit = $value;
    }



    public function render()
    {
        return view('livewire.product-finder.product-shop-page')->with([
            'product' => $this->product,
            'product_units' => $this->product_units,

        ]);
    }
}
