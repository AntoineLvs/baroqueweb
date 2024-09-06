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
    public $base_product_id =1;

    public $standards;
    public $standard_id;

    public $model;
    public $options;
    public $showContent;


    public $product_unit_id = 1;
    public $product_units;

    public $selectedBaseProduct;

    public $document_type = 1;

    public $blend_percent;
    public $blendPercentVisible = false;


    public function mount($base_products, $product_units)
    {
        $this->base_products = $base_products;
        $this->product_units = $product_units;

    }



    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'data' => 'nullable|string|max:300',
            'product_unit_id' => 'required|integer',
            'base_product_id' => 'required|integer',
            'blend_percent' => 'nullable|integer',

        ]);

        // Hole das BaseProduct-Modell basierend auf der base_product_id
        $baseProduct = BaseProduct::find($this->base_product_id);

        // Falls ein BaseProduct gefunden wurde, weise den product_type_id zu
        if ($baseProduct) {
            $data['product_type_id'] = $baseProduct->product_type_id;
        } else {
            // Fehlermeldung oder Standard-Logik für den Fall, dass das BaseProduct nicht gefunden wird
            return redirect()->back()->withErrors(['base_product_id' => 'Invalid base product selected.']);
        }

        // Create the Product
        $product = Product::create($data);


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
