<?php

namespace App\Livewire\ProductType;

use Livewire\Component;
use App\Models\ProductType;

class EditProductType extends Component
{

    public $name; 

    public $product_type;



    public function mount($product_type)
    {
      $this->product_type = $product_type;
      $this->name = $product_type->name;


    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
           

        ]);


        $this->product_type->name = $this->name;
        $this->product_type->fresh();
        $this->product_type->save();

        return redirect()
            ->route('product-types.index')
            ->with('message', 'Product Type wurde erstellt.');
    }

    public function render()
    {
        return view('livewire.product-type.edit-product-type');
    }
}
