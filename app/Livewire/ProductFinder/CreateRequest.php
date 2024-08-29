<?php

namespace App\Livewire\ProductFinder;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class CreateRequest extends Component
{
    public $product;

    // Order-related fields
    public $tenant_id = 1;
    public $order_type_id = 1;
    public $order_status_id = 1;
    public $product_type_id;

    // Customer-related fields
    public $customer_tenant_id;
    public $customer_company_name;
    public $customer_email;
    public $customer_phone;
    public $customer_contact_firstname;
    public $customer_contact_lastname;
    public $customer_street;
    public $customer_zip;
    public $customer_city;
    public $customer_country;
    public $customer_order_notice;

    // General fields
    public $order_notice;
    public $date_valid;
    public $total_amount;
    public $price_unit;
    public $date_customer_sent;
    public $date_customer_confirmed;
    public $date_customer_cancelled;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function save()
    {
        $data = $this->validate([
            // Order-related fields
            'tenant_id' => 'required|integer',
            'order_type_id' => 'required|integer',
            'order_status_id' => 'required|integer',
            'product_type_id' => 'nullable|integer',

            // Customer-related fields
            'customer_tenant_id' => 'nullable|integer',
            'customer_company_name' => 'nullable|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'customer_contact_firstname' => 'nullable|string|max:255',
            'customer_contact_lastname' => 'nullable|string|max:255',
            'customer_street' => 'nullable|string|max:255',
            'customer_zip' => 'nullable|string|max:20',
            'customer_city' => 'nullable|string|max:100',
            'customer_country' => 'nullable|string|max:100',
            'customer_order_notice' => 'nullable|string',

            // General fields
            'order_notice' => 'nullable|string',
            'date_valid' => 'nullable|date',
            'total_amount' => 'nullable|numeric',
            'price_unit' => 'nullable|string|max:50',
            'date_customer_sent' => 'nullable|date',
            'date_customer_confirmed' => 'nullable|date',
            'date_customer_cancelled' => 'nullable|date',
        ]);

        $order = Order::create($data);

        $order->save();

        $message = 'Order was created successfully.';

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
