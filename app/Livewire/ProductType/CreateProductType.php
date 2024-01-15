<?php

namespace App\Livewire\ProductType;

use Livewire\Component;
use App\Models\ProductType;

class CreateProductType extends Component
{

    public $name; 

    public $product_type;





    public function mount()
    {


    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
           

        ]);

        $product_type = ProductType::create($data);
        $product_type->fresh();
        $product_type->save();

        return redirect()
            ->route('product-types.index')
            ->with('message', 'Product Type wurde erstellt.');
    }

    public function render()
    {
        return view('livewire.product-type.create-product-type');
    }
}
