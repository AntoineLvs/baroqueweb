<?php

namespace App\Livewire\ProductFinder;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class CreateRequest_back extends Component
{
    public $product;
    public $contact_person;
    public $tenant_id = 1;
    public $order_type_id = 1;
    public $order_status_id = 1;

    public function mount(Product $product)
    {
        $this->product = $product;
    }


    public function save()
    {
        $data = $this->validate([
            'contact_person' => 'required|string|max:100',
            'tenant_id'=> 'required',
            'order_type_id' => 'required',
            'order_status_id' => 'required',
        ]);


        $order = Order::create($data);

        $order->save();

        $message = ' Order was created successfully.';

        return redirect()
            ->route('product-finder.index-public')
            ->with('message', $message);
    }

    public function render()
    {
        return view('livewire.product-finder.create-request')->with([
            'product' => $this->product,
        ]);
    }
}
