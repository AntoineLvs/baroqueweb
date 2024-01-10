<?php

namespace App\Livewire\ProductOffer;

use App\Models\OfferedProduct;
use Livewire\Component;

class ProductTable extends Component
{
    public $editedProductIndex = null;

    public $editedProductField = null;

    public $products = [];

    public $product_offer;

    public $offered_products;

    protected $rules = [

        'products.*.price' => ['required', 'numeric'],
    ];

    protected $validationAttributes = [

        'products.*.price' => 'Price',
    ];

    public function mount($product_offer)
    {
        $this->product_offer = $product_offer;
        $this->products = $product_offer->products->toArray();

    }

    public function render()
    {
        return view('livewire.product-offer.product-table', [
            'products' => $this->products,
        ]);
    }

    public function editProduct($productIndex)
    {
        $this->editedProductIndex = $productIndex;
    }

    public function editProductField($productIndex, $fieldName)
    {
        $this->editedProductField = $productIndex.'.'.$fieldName;
    }

    public function saveProduct($productIndex)
    {
        $this->validate();

        $product = $this->products[$productIndex] ?? null;
        if (! is_null($product)) {
            optional(OfferedProduct::find($product['id']))->update($product);
        }
        $this->editedProductIndex = null;
        $this->editedProductField = null;
    }
}
