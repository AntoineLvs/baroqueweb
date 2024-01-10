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

    use WithFileUploads;


    public $name;
    public $data;
    public $blend_percent;
  
    public $product_type_id;
    public $product_types;
  
    public $product_unit_id;
    public $product_units;
  
    public $standards;
    public $standard_id;
  
    public $baseProducts = [];
    public $base_product_id;
  
  
    public $product;
  
    public $blendPercentVisible = false;
    public $base_products;
  
  
  
    public function mount(Product $product, $product_types, $product_units)
    {
      $this->product_types = $product_types;
      $this->product_units = $product_units;
  
      $this->product = $product;
  
      $this->product_type_id = $product->product_type_id;
      $this->product_unit_id = $product->product_unit_id;
      $this->standard_id = $product->standard_id;

  
      $this->name = $product->name;
      $this->data = $product->data;
  
      $this->baseProducts = BaseProduct::all();
      $this->base_product_id = BaseProduct::where('id', $product->base_product_id)->get()->first()->id;
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
        'data' => 'string|max:500',
        'product_type_id' => 'required',
        'product_unit_id' => 'required',
        'base_product_id' => 'required',
        'standard_id' => 'nullable',
        'blend_percent' => 'nullable',
  
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
      $this->product_types = ProductType::all();
      if ($this->product_type_id) {
        $this->base_products = BaseProduct::where('product_type_id', $this->product_type_id)->get();
        $this->standards = Standard::where('product_type_id', $this->product_type_id)->get();
      } else {
        $this->base_products = [];
        $this->standards = [];
      }
  
      return view('livewire.product.edit-product', [
        'product_types' => $this->product_types,
        'product_units' => $this->product_units,
        'base_products' => $this->base_products,
        'standards' => $this->standards,
  
      ]);
    }
}
