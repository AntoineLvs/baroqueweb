<?php

namespace App\Livewire\Product;

use Illuminate\Support\Facades\Auth;
use App\Models\BaseProduct;
use App\Models\Document;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Standard;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{


    public $product;

    public $name;
    public $data;


    public $product_type_id;
    public $product_types;
    public $value;
    public $document_id;

    public $base_products;
    public $base_product_id;

    public $standards;
    public $standard_id;

    public $model;
    public $options;
    public $showContent;


    public $product_unit_id = 1;
    public $product_units;

    public $selectedProductType;

    public $document_type = 1;

    public $blend_percent = 0;
    public $blendPercentVisible = false;


    public function mount($base_products, $product_units, $standards)
    {
        $this->base_products = $base_products;
        $this->product_units = $product_units;
        $this->standards = $standards;
    }

    public function updatedSelectedBaseProduct()
    {
        if ($this->product_type_id == '1') {
            if ($this->base_product_id == '1') {
                // Show input to fill blend_percent for Indivudual Blend percent
                $this->blendPercentVisible = true;
            } else {
                // Don't show the input, and add the original blend_percent value to blend_percent
                $baseProduct = BaseProduct::find($this->base_product_id);
                if ($baseProduct) {
                    $this->blend_percent = $baseProduct->blend_percent;
                } else {
                    $this->blend_percent = 0;
                }
                $this->blendPercentVisible = false;
            }
        } else {
            // Don't show input if Product type isn't HVO -> no blend_percent
            $this->blend_percent = 0;
            $this->blendPercentVisible = false;
        }
    }


    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'data' => 'string|max:500',
            //'product_type_id' => 'required',
            'product_unit_id' => 'required',
            'base_product_id' => 'required',
            'standard_id' => 'required',
            'blend_percent' => 'nullable',

        ]);

        // Créez le produit
        $product = Product::create($data);

        // Sauvegardez le produit pour obtenir son ID généré automatiquement
        $product->save();



        $message = '' . $product->name . ' was created successfully.';

        return redirect()
            ->route('products.index')
            ->with('message', $message);
    }



    public function render()
    {



        return view('livewire.product.create-product', [

            'product_units' => $this->product_units,
            'base_products' => $this->base_products,
            'standards' => $this->standards,
        ]);
    }
}
