<?php

namespace App\Livewire\BaseProduct;

use App\Models\ProductUnit;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBaseProduct extends Component
{
    use WithFileUploads;

    public $name;

    public $data;

    public $product_type_id = 1;

    public $product_types;

    public $product_unit_id = 1;

    public $product_units;

    public $base_product_id;

    public $base_product;

    public $blend_percent;

    public function mount($base_product, $product_types)
    {

        //ddd($product);

        $this->product_types = $product_types;
        $this->product_units = ProductUnit::all();

        $this->base_product = $base_product;

        $this->product_type_id = $base_product->product_type_id;
        $this->product_unit_id = $base_product->product_unit_id;

        $this->name = $base_product->name;
        $this->data = $base_product->data;
        $this->blend_percent = $base_product->blend_percent;

    }

    public function render()
    {
        return view('livewire.base-product.edit-base-product', [
            'product_types' => $this->product_types,
        ]);
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'data' => 'nullable|string|max:500',
            'product_type_id' => 'required',

        ]);

        $this->base_product->name = $this->name;
        $this->base_product->data = $this->data;
        $this->base_product->product_type_id = $this->product_type_id;
        //  $this->product->product_base_id = $this->product_base_id;

        $this->base_product->fresh();
        $this->base_product->save();

        return redirect()
            ->route('base-products.index')
            ->with('message', 'Stamm-Artikel wurde aktualisiert.');

    }
}
