<?php

namespace App\Livewire\Product;

use App\Models\BaseProduct;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductUnit;
use App\Models\Standard;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{



    public $name;
    public $data;
    public $blend_percent;

    public $product_type_id;
    public $product_types;

    public $product_unit_id;
    public $product_units;

    public $standards;
    public $standard_id;

    public $base_products;
    public $base_product_id;


    public $product;

    public $blendPercentVisible = false;



    public function mount(Product $product, $product_types, $base_products, $product_units)
    {
      $this->product_types = $product_types;
      $this->product_units = $product_units;

      $this->product = $product;

      $this->blend_percent = $product->blend_percent;

      $this->product_type_id = $product->product_type_id;
      $this->product_unit_id = $product->product_unit_id;
      $this->standard_id = $product->standard_id;

      $this->name = $product->name;
      $this->data = $product->data;

      $this->base_products = $base_products;
      $this->base_product_id = $product->base_product_id;
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
    public function updatedBaseProductId()
    {
      if ($this->product_type_id == '1' && $this->base_product_id != '1') {
        // User selected a base_product other than 'HVO Individual Blend'
        $baseProduct = BaseProduct::find($this->base_product_id);
        // Original blend percent of the base product retrieved, and used for the new product blend percent
        if ($baseProduct) {
          $this->blend_percent = $baseProduct->blend_percent;
        }
      }
    }

    public function submit()
    {
      $data = $this->validate([
        'name' => 'required|string|max:100',
        'data' => 'nullable|string|max:500',
        'product_type_id' => 'required',
        'product_unit_id' => 'required',
        'base_product_id' => 'required',
        'standard_id' => 'nullable',
        'blend_percent' => 'nullable|numeric',

      ]);



      $this->product->product_type_id = $this->product_type_id;
      $this->product->base_product_id = $this->base_product_id;
      $this->product->blend_percent = $this->blend_percent;
      $this->product->standard_id = $this->standard_id;
      $this->product->name = $this->name;
      $this->product->data = $this->data;
      $this->product->product_unit_id = $this->product_unit_id;;

      $this->product->fresh();
      $this->product->save();

      $message = '' . $this->product->name . ' was edited successfully.';

      return redirect()
        ->route('products.index')
        ->with('message', $message);
    }

    public function render()
    {


      return view('livewire.product.edit-product', [
        'product_types' => $this->product_types,
        'product_units' => $this->product_units,
        'base_products' => $this->base_products,
        'standards' => $this->standards,

      ]);
    }
}
