<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;



class EditOrder extends Component
{
    public $order;

    // Order-related fields
    public $order_status_id;
    public $order_type_id;

    public $order_statuses;
    public $order_types;

    // Collection für die Ordered Products
    public $products;
    public $ordered_products;
    public $selected_product_id;
    public $product_unit_id;
    public $product_units;
    public $product_price;
    public $product_quantity = 1;
    public $product_tax = 19.00;

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

    // sonstige Felder
    public $order_notice;

    public function mount(Order $order, $order_types, $order_statuses, $product_units)
    {
        $this->order = $order;
        $this->order_types = $order_types;
        $this->order_statuses = $order_statuses;
        $this->product_units = $product_units;

        $this->products = Product::all();

// Fülle die Felder aus der Order
        $this->order_status_id = $order->order_status_id;
        $this->order_type_id = $order->order_type_id;

        $this->order_notice = $order->order_notice;

// Kundeninformationen
        $this->customer_tenant_id = $order->customer_tenant_id;
        $this->customer_company_name = $order->customer_company_name;
        $this->customer_email = $order->customer_email;
        $this->customer_phone = $order->customer_phone;
        $this->customer_contact_firstname = $order->customer_contact_firstname;
        $this->customer_contact_lastname = $order->customer_contact_lastname;
        $this->customer_street = $order->customer_street;
        $this->customer_zip = $order->customer_zip;
        $this->customer_city = $order->customer_city;
        $this->customer_country = $order->customer_country;
        $this->customer_order_notice = $order->customer_order_notice;

// Lade die vorhandenen Produkte der Bestellung als Collection
      //  $this->ordered_products = $order->orderedProducts()->get();

        // Prüfen, ob der Benutzer der Empfänger der Order ist
        if (auth()->user()->tenant_id === $order->to_tenant_id) {
            $this->ordered_products = $order->orderedProductsForRecipient();
        } else {
            $this->ordered_products = $order->orderedProducts;
        }


        // Automatische Vorauswahl des ersten Produkts für den Tenant, falls vorhanden
        if ($this->products->isNotEmpty()) {
            $this->selected_product_id = $this->products->first()->id;
        }

    }

    public function submit()
    {
        $data = $this->validate([
            'order_status_id' => 'required|integer',
            'order_type_id' => 'required|integer',

            'customer_company_name' => 'nullable|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'customer_contact_firstname' => 'nullable|string|max:255',
            'customer_contact_lastname' => 'nullable|string|max:255',
            'customer_street' => 'nullable|string|max:255',
            'customer_zip' => 'nullable|string|max:20',
            'customer_city' => 'nullable|string|max:100',
            'customer_country' => 'nullable|string|max:100',
            'customer_order_notice' => 'nullable|string|max:500',
            'order_notice' => 'nullable|string|max:500',
        ]);

// Aktualisiere die Order-Informationen
        $this->order->update([
            'order_status_id' => $this->order_status_id,
            'order_type_id' => $this->order_type_id,
            'customer_company_name' => $this->customer_company_name,
            'customer_email' => $this->customer_email,
            'customer_phone' => $this->customer_phone,
            'customer_contact_firstname' => $this->customer_contact_firstname,
            'customer_contact_lastname' => $this->customer_contact_lastname,
            'customer_street' => $this->customer_street,
            'customer_zip' => $this->customer_zip,
            'customer_city' => $this->customer_city,
            'customer_country' => $this->customer_country,
            'customer_order_notice' => $this->customer_order_notice,
            'order_notice' => $this->order_notice,
        ]);


        session()->flash('message', 'Die Bestellung wurde erfolgreich aktualisiert.');

        return redirect()->route('orders.index');
    }

    public function render()
    {
        return view('livewire.order.edit-order', [
            'products' => $this->products,
            'order_types' => $this->order_types,
            'order_statuses' => $this->order_statuses,
            'product_units' => $this->product_units,
            'ordered_products' => $this->ordered_products,
        ]);
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

        // Prüfe, ob das Produkt bereits hinzugefügt wurde
        $existingProduct = $this->ordered_products->firstWhere('product_id', $this->selected_product_id);

        if (!$existingProduct) {
            // Speichere das neue OrderedProduct in der Datenbank
            $orderedProduct = OrderedProduct::create([
                'order_id' => $this->order->id,
                'product_id' => $this->selected_product_id,
                'product_quantity' => $this->product_quantity,
                'product_price' => $this->product_price,
                'product_tax' => $this->product_tax,
                'total_amount' => $total_amount,
            ]);

            // Aktualisiere die Collection der bestellten Produkte
            $this->ordered_products->push($orderedProduct);


            // Felder zurücksetzen
            $this->selected_product_id = $this->products->first()->id;
            $this->product_quantity = 1;
            $this->product_price = 0;
            $this->product_tax = 19.00;
        } else {
            session()->flash('error', 'Das Produkt wurde bereits hinzugefügt.');
        }
    }


    public function removeProduct($productId)
    {
        // Hole das zu entfernende OrderedProduct anhand der Produkt-ID
        $orderedProduct = OrderedProduct::where('order_id', $this->order->id)
            ->where('product_id', $productId)
            ->first();

        if ($orderedProduct) {
            // Lösche das Produkt in der Datenbank
            $orderedProduct->delete();

            // Entferne das Produkt aus der Collection
            $this->ordered_products = $this->ordered_products->reject(function ($product) use ($productId) {
                return $product->product_id == $productId;
            });

            // Setze eine Session-Message, um die erfolgreiche Entfernung zu melden
            session()->flash('message', 'Das Produkt wurde erfolgreich entfernt.');
        } else {
            // Setze eine Fehlermeldung, falls das Produkt nicht existiert
            session()->flash('error', 'Das Produkt konnte nicht entfernt werden.');
        }
    }



// Send offer mail from the frontend edit view
      public function handleOrderAction()
    {
        try {
            switch ($this->order->order_status_id) {
                case 1:
                    // Send New Offer Email
                    Mail::to($this->order->customer_email)->send(new NewProductOffer($this->order));
                    $this->order->order_status_id = 21; // Setze auf neuen Status (z.B. 'Angebot gesendet')
                    session()->flash('message', 'Angebot wurde gesendet.');
                    break;

                case 2:
                    // Send Order Confirmation Email
                    // Mail::to($this->order->customer_email)->send(new OrderConfirmation($this->order)); // Beispiel-E-Mail
                    $this->order->order_status_id = 5; // Setze auf neuen Status (z.B. 'Bestellbestätigung gesendet')
                    session()->flash('message', 'Bestellbestätigung wurde gesendet.');
                    break;

                case 3:
                    // Handle other statuses (e.g. cancellation)
                    // Mail::to($this->order->customer_email)->send(new XYZEmail($this->order)); // Beispiel-E-Mail
                    $this->order->order_status_id = 6; // Setze auf neuen Status
                    session()->flash('message', 'XYZ Text wurde gesendet.');
                    break;

                default:
                    session()->flash('error', 'Ungültiger Status.');
                    return;
            }

            // Speichere den aktualisierten Status in der Datenbank
            //ddd($this->order);

            $this->order->save();

        } catch (\Exception $e) {
            // Falls ein Fehler auftritt, protokolliere diesen und setze eine Fehlermeldung
            \Log::error('Fehler beim Senden der E-Mail: ' . $e->getMessage());
            session()->flash('error', 'Es gab ein Problem beim Senden der E-Mail oder Speichern des Status.');
        }

    }

    public function getActionButtonLabel()
    {
        switch ($this->order->order_status_id) {
            case 1:
                return 'Angebot senden';
            case 2:
                return 'Bestellbestätigung senden';
            case 3:
                return 'XYZ Text senden';
            default:
                return 'Aktion ausführen';
        }
    }

}
