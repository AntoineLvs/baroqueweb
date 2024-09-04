<?php

namespace App\Livewire\Order;

use App\Models\Document;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOrder extends Component
{


    public $search = '';

    public $informations;
    public $date_valid;
    public $date;
    public $users;
    public $contact_person;

    public $product_id = '';

    public $products;

    public $customer_tenant_id;

    public $customer_tenant;

    public $product_unit_id = 1;

    public $product_units;

    public $allProducts = [];

    public $ordered_products;

    public $product_price;

    public $product_tax = 0.19;

    public $product_quantity;


    public function mount()
    {


        $this->allProducts = Product::all();
        $this->product_units = ProductUnit::all();
        $this->users = User::all();
        $this->contact_person = Auth::user()->id;
        $this->customer_tenants = Tenant::where('id', '!=', Auth::user()->tenant_id)->get();


    }

    public function submit()
    {

        $data = $this->validate([
            'informations' => 'nullable|string|max:500',

            'product_unit_id' => 'required',
            'product_quantity' => 'required|integer',

            'product_tax' => 'required',

        ]);

        // create new Offer
        $order = new Order;

        // change active status and add attributes

        $order->informations = $this->informations;

        if ($this->contact_person == null) {
            $user = Auth::user();
            $order->contact_person = $user->id;
        } else {
            $order->contact_person = $this->contact_person;
        }



        // format the date
        // $formatted_date = Carbon::parse($this->date_valid)->format('Y-m-d H:i:s');;
        // $order->date_valid = $formatted_date;

        $order->save();
        $order->fresh();

        return redirect()
            ->route('orders.index')
            ->with('message', 'Order was created successfully.');

    }


    public function render()
    {
        return view('livewire.order.create-order', [
                'products' => $this->products,
            ]
        );
    }
}
