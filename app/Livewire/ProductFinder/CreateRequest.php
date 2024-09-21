<?php

namespace App\Livewire\ProductFinder;

use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\ProductUnit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mail;
use Modules\Order\Mail\NewProductRequest;

class CreateRequest extends Component
{
    public $product;


    // Order-related fields
    public $tenant_id = 1;
    public $order_type_id = 1;
    public $order_status_id = 1;
    public $product_type_id;

    public $product_units;
    public $product_unit_id = 1;

    public $request_quantity = 1000;

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
    public $product_unit;
    public $date_customer_sent;
    public $date_customer_confirmed;
    public $date_customer_cancelled;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->product_units = ProductUnit::all();
    }

    public function save()
    {
        $data = $this->validate([
            // Order-related fields
            'tenant_id' => 'required|integer',
            'order_type_id' => 'required|integer',
            'order_status_id' => 'required|integer',
            'product_type_id' => 'nullable|integer',
            'request_quantity' => 'nullable|integer',

            // Customer-related fields
            'customer_tenant_id' => 'nullable|integer',
            'customer_company_name' => 'nullable|string|max:255',
            'customer_email' => 'required|email|max:255',
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


        ]);

        $order = Order::create($data);

        if(Auth::user())
        {
            $order->to_tenant_id = $this->product->tenant->id;
        }


        $order->save();

        // OrderedProducts für jedes Produkt erstellen

        $ordered_product = OrderedProduct::create([
            'tenant_id' => 1,
            'order_id' => $order->id,
            'product_id' => $this->product->id,
            'product_quantity' => $this->request_quantity,
            'product_unit_id' => $this->product_unit_id,
        ]);

        $ordered_product->save();

        $order->fresh();

        // E-Mail an den Benutzer, der die Anfrage sendet
        Mail::to($order->customer_email)->send(new NewProductRequest($order, $ordered_product));

        // E-Mail an den Empfänger (Tenant, der das Produkt anbietet)
        Mail::to($this->product->tenant->email)->send(new NewProductRequest($order, $ordered_product));


        $message = 'Ihre Anfrage wurde erfolgreich übermittelt. ';

        return redirect()
            ->route('product-finder.index-public')
            ->with('message', $message);
    }

    public function render()
    {
        return view('livewire.product-finder.create-request')->with([
            'product' => $this->product,
            'product_units' => $this->product_units,
        ]);
    }

    public function fillWithSampleData()
    {
        // Order-related fields
        $this->request_quantity = 2500;

        // Customer-related fields

        $this->customer_company_name = 'Musterfirma GmbH';
        $this->customer_email = 'muster@email.com';
        $this->customer_phone = '+49 123 456 789';
        $this->customer_contact_firstname = 'Max';
        $this->customer_contact_lastname = 'Mustermann';
        $this->customer_street = 'Musterstraße 1';
        $this->customer_zip = '12345';
        $this->customer_city = 'Musterstadt';
        $this->customer_country = 'Deutschland';
        $this->customer_order_notice = 'Bitte die Lieferung so schnell wie möglich durchführen.';

        // General fields
        $this->order_notice = 'Dringende Anfrage.';

    }
}
