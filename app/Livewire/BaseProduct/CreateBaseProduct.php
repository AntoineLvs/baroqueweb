<?php

namespace App\Livewire\BaseProduct;

use App\Models\BaseProduct;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBaseProduct extends Component
{
    use WithFileUploads;

    public $file;

    public $name;

    public $data;

    public $product_type_id = 1;

    public $product_types;

    public $base_product_id;

    public $document_type = 1;

    public $blend_percent;

    public function mount($product_types)
    {
        $this->product_types = $product_types;
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'data' => 'nullable|string|max:100',
            'product_type_id' => 'required',
            'base_product_id' => 'nullable',
            'blend_percent' => 'nullable',

        ]);

        $product = BaseProduct::create($data);

        $product->fresh();
        $product->save();

        return redirect()
            ->route('base-products.index')
            ->with('message', 'Product was created successfully.');

    }

    public function render()
    {
        return view('livewire.base-product.create-base-product', [
            'product_types' => $this->product_types,

        ]);
    }
}
