<?php

namespace App\Livewire\Shipping;

use App\Models\Shipping;
use App\Models\ShippingStatus;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditShipping extends Component
{
    public $shipping;

    // Shipping-related fields
    public $shipping_status_id;
    public $shipping_statuses;

    // Contact Informations from order creator
    public $contact_person;

    public $tenant_id;
    public $from_tenant_id;
    public $to_tenant_id;
    public $shipper_tenant_id;
    public $shipper_tenants;

    // sonstige Felder
    public $date_of_shipping;
    public $order_notice;
    public $shipping_notice;

    // Customer-related fields
    public $tenants;
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

    public function mount(Shipping $shipping)
    {
        $this->shipping = $shipping;

        // Fülle die Felder mit den vorhandenen Daten
        $this->shipping_status_id = $shipping->shipping_status_id;
        $this->tenant_id = $shipping->tenant_id;
        $this->from_tenant_id = $shipping->from_tenant_id;
        $this->to_tenant_id = $shipping->to_tenant_id;
        $this->shipper_tenant_id = $shipping->shipper_tenant_id;
        $this->date_of_shipping = $shipping->date_of_shipping->format('Y-m-d');
        $this->order_notice = $shipping->order_notice;
        $this->shipping_notice = $shipping->shipping_notice;

        // Kundeninformationen
        $this->customer_company_name = $shipping->customer_company_name;
        $this->customer_email = $shipping->customer_email;
        $this->customer_phone = $shipping->customer_phone;
        $this->customer_contact_firstname = $shipping->customer_contact_firstname;
        $this->customer_contact_lastname = $shipping->customer_contact_lastname;
        $this->customer_street = $shipping->customer_street;
        $this->customer_zip = $shipping->customer_zip;
        $this->customer_city = $shipping->customer_city;
        $this->customer_country = $shipping->customer_country;
        $this->customer_order_notice = $shipping->customer_order_notice;

        // Lade benötigte Daten
        $this->shipping_statuses = ShippingStatus::all();
        $this->tenants = Tenant::all();
        $this->shipper_tenants = Tenant::where('tenant_type_id', '=', 3)->get();


    }

    public function submit()
    {
        $data = $this->validate([
            'shipping_status_id' => 'required|integer',
            'tenant_id' => 'required|integer',
            'from_tenant_id' => 'required|integer',
            'to_tenant_id' => 'nullable|integer',
            'shipper_tenant_id' => 'required|integer',
            'date_of_shipping' => 'required|date',
            'customer_company_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:50',
            'customer_contact_firstname' => 'required|string|max:255',
            'customer_contact_lastname' => 'nullable|string|max:255',
            'customer_street' => 'required|string|max:255',
            'customer_zip' => 'required|string|max:20',
            'customer_city' => 'required|string|max:100',
            'customer_country' => 'required|string|max:100',
            'order_notice' => 'nullable|string|max:500',
        ]);

        // Aktualisiere die Shipping-Informationen
        $this->shipping->update($data);

        return redirect()
            ->route('shippings.index')
            ->with('message', 'Shipping order was updated successfully.');
    }

    public function render()
    {
        return view('livewire.shipping.edit-shipping', [
            'shipping_statuses' => $this->shipping_statuses,
            'tenants' => $this->tenants,
            'shipper_tenants' => $this->shipper_tenants,
        ]);
    }

    // Methode zum Ausfüllen mit Demo-Daten
    public function fillWithDemoData()
    {
        // Beispielhafte Shipping-Daten
        $this->from_tenant_id = Tenant::skip(1)->first()->id;
        $this->to_tenant_id = Tenant::skip(3)->first()->id ?? null;
        $this->shipper_tenant_id = Tenant::where('tenant_type_id', 3)->first()->id ?? null;

        // Beispielhafte Customer-Daten
        $this->customer_company_name = 'Demo Anlieferungs GmbH';
        $this->customer_email = 'demo@example.com';
        $this->customer_phone = '+49 123 456789';
        $this->customer_contact_firstname = 'Max';
        $this->customer_contact_lastname = 'Mustermann';
        $this->customer_street = 'Musterstraße 1';
        $this->customer_zip = '12345';
        $this->customer_city = 'Musterstadt';
        $this->customer_country = 'Deutschland';

        // Beispielhafter Hinweis zur Bestellung
        $this->shipping_notice = 'Kunde 1h vorher tel. avis.';
        $this->customer_order_notice = 'Bitte vorne anliefern.';
    }
}
