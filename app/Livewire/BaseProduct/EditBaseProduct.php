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

    public $product;

    public function mount($product, $product_types)
    {

        //ddd($product);

        $this->product_types = $product_types;
        $this->product_units = ProductUnit::all();

        $this->product = $product;

        $this->product_type_id = $product->product_type_id;
        $this->product_unit_id = $product->product_unit_id;

        $this->name = $product->name;
        $this->data = $product->data;

    }

    public function render()
    {
        return view('livewire.base-product.edit-base-product', [
            'product_types' => $this->product_types,
        ]);
    }

    public function reset_file()
    {
        $this->file = '';
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'data' => 'nullable|string|max:500',
            'product_type_id' => 'required',

        ]);

        $this->product->name = $this->name;
        $this->product->data = $this->data;
        $this->product->product_type_id = $this->product_type_id;
        //  $this->product->product_base_id = $this->product_base_id;

        $this->product->fresh();
        $this->product->save();

        return redirect()
            ->route('baseproducts.index')
            ->with('message', 'Stamm-Artikel wurde aktualisiert.');

    }
}
