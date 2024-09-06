<?php
namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\OrderStatus;
use App\Models\OrderType;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Tenant;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateOrder extends Component
{
    public $order;

    // Order-related fields
    public $order_status_id = 1;
    public $order_type_id = 1;

    public $order_statuses;
    public $order_types;

    // Contact Informations from order creator
    public $contact_person;
    public $tenant_id = 1;

    // Ordered Products Collection
    public Collection $ordered_products;
    public $products;
    public $product_quantity = 1;
    public $selected_product_id;
    public $product_unit_id;
    public $product_units;
    public $product_price;
    public $product_tax = 19.00;

    // sonstige Felder
    public $order_notice;

    // Customer-related fields
    public $customer_tenants;
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

    public function mount()
    {
        $this->order_types = OrderType::all();
        $this->order_statuses = OrderStatus::all();
        $this->products = Product::all();
        $this->product_units = ProductUnit::all();
        $this->contact_person = Auth::user()->id;
        $this->customer_tenants = Tenant::where('id', '!=', Auth::user()->tenant_id)->get();

        // Initialize ordered_products as a Collection
        $this->ordered_products = collect([]);

        // Automatische Vorauswahl des ersten Produkts für den Tenant, falls vorhanden
        if ($this->products->isNotEmpty()) {
            $this->selected_product_id = $this->products->first()->id;
        }
    }

    public function addProduct()
    {
        // Validierung für das ausgewählte Produkt und die Menge
        $this->validate([
            'selected_product_id' => 'required|integer',
            'product_quantity' => 'required|integer|min:1',
            'product_price' => 'nullable|numeric|min:0',
            'product_tax' => 'nullable|numeric|min:0',
        ]);

        // Berechne den Gesamtbetrag (total_amount)
        $total_amount = $this->product_quantity * $this->product_price * (1 + $this->product_tax / 100);

        // Prüfe, ob das Produkt bereits in der Collection vorhanden ist
        $existingProduct = $this->ordered_products->firstWhere('product_id', $this->selected_product_id);

        if ($existingProduct) {
            session()->flash('error', 'Das Produkt wurde bereits zur Bestellung hinzugefügt.');
            return;
        }

        // Füge das Produkt zur Collection der bestellten Produkte hinzu
        $this->ordered_products->push([
            'product_id' => $this->selected_product_id,
            'product_quantity' => $this->product_quantity,
            'product_price' => $this->product_price,
            'product_tax' => $this->product_tax,
            'total_amount' => $total_amount,
            'product' => Product::find($this->selected_product_id),
        ]);

        // Zurücksetzen der Eingabefelder
        $this->selected_product_id = $this->products->first()->id ?? null;
        $this->product_quantity = 1;
        $this->product_price = 0;
        $this->product_tax = 19;
    }

    public function removeProduct($index)
    {
        // Entferne das Produkt aus der Collection
        $this->ordered_products->forget($index);

        // Setze eine Session-Message, um die erfolgreiche Entfernung zu melden
        session()->flash('message', 'Das Produkt wurde erfolgreich entfernt.');
    }

    public function submit()
    {
        $data = $this->validate([
            'order_status_id' => 'required|integer',
            'order_type_id' => 'required|integer',
            'tenant_id' => 'required|integer',
            'customer_company_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'customer_contact_firstname' => 'required|string|max:255',
            'customer_contact_lastname' => 'nullable|string|max:255',
            'customer_street' => 'nullable|string|max:255',
            'customer_zip' => 'nullable|string|max:20',
            'customer_city' => 'nullable|string|max:100',
            'customer_country' => 'nullable|string|max:100',
            'customer_order_notice' => 'nullable|string|max:500',
            'order_notice' => 'nullable|string|max:500',
        ]);

        $order = Order::create($data);

        // Füge die bestellten Produkte hinzu
        foreach ($this->ordered_products as $product) {
           $op = OrderedProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'product_quantity' => $product['product_quantity'],
                'product_price' => $product['product_price'],
                'product_tax' => $product['product_tax'],
                'total_amount' => $product['total_amount'],
            ]);
           $op->save();

        }

        // Speichere die restlichen Daten
        $order->contact_person = $this->contact_person ?? Auth::user()->id;
        $order->save();

        return redirect()
            ->route('orders.index')
            ->with('message', 'Order was created successfully.');
    }

    public function render()
    {
        return view('livewire.order.create-order', [
            'products' => $this->products,
            'order_types' => $this->order_types,
            'order_statuses' => $this->order_statuses,
            'product_units' => $this->product_units,
            'customer_tenants' => $this->customer_tenants,
        ]);
    }

    public function fillWithDemoData()
    {
        $randomNumber = rand(1000, 9999); // Generiert eine zufällige Zahl zwischen 1000 und 9999
        $this->customer_company_name = 'Demo Firma ' . $randomNumber . ' GmbH ';
        $this->customer_email = 'demo@example.com';
        $this->customer_phone = '+49 123 456789';
        $this->customer_contact_firstname = 'Max';
        $this->customer_contact_lastname = 'Mustermann';
        $this->customer_street = 'Musterstraße 1';
        $this->customer_zip = '12345';
        $this->customer_city = 'Musterstadt';
        $this->customer_country = 'Deutschland';
        $this->customer_order_notice = 'Bitte die Lieferung so schnell wie möglich durchführen.';
        $this->order_notice = 'Dies ist ein Demo-Auftrag zur Testzwecken.';
    }
}
