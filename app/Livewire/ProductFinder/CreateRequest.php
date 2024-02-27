<?php

namespace App\Livewire\ProductFinder;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class CreateRequest extends Component
{
    public $product;


    public function mount(Product $product)
    {
        $this->product = $product;


    }


    public function save()
    {
        Order::create(
            $this->only(['title', 'content'])
        );

        return $this->redirect('/posts')
            ->with('status', 'Post successfully created.');
    }

    public function render()
    {
        return view('livewire.product-finder.create-request')->with([
            'product' => $this->product,
        ]);
    }
}
