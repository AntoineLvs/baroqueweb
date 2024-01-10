<?php

namespace App\Livewire\ProductOfferInquiry;

use App\Models\Product;
use App\Models\ProductOfferInquiry;
use App\Models\ProductType;
use App\Models\ProductUnit;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mail;

class CreateInquiry extends Component
{
    public $allProducts = [];

    public $product_unit_id = 1;

    public $product_units;

    public $product_type_id = 1;

    public $product_types;

    public $isActive = 0;

    public $inquired_products;

    public $inquired_product;

    public $supplier_tenant_id;

    public $supplier_tenants;

    public $request_text;

    public $request_quantity;

    public function mount()
    {

        $this->allProducts = Product::all();

        $this->product_units = ProductUnit::all();
        $this->product_types = ProductType::all();

        $this->supplier_tenants = Tenant::where('id', '!=', Auth::user()->tenant_id)->get();

    }

    public function submit()
    {

        $data = $this->validate([
            'request_text' => 'nullable|string|max:500',
            'request_quantity' => 'required',
            'product_unit_id' => 'required',
            'product_type_id' => 'required',

        ]);

        // create new ProductOfferRequest
        $product_offer_inquiry = new ProductOfferInquiry;

        if ($this->isActive == 1) {
            $product_offer_inquiry->active = $this->isActive;
            $this->supplier_tenant_id == null;

        }

        $product_offer_inquiry->supplier_tenant_id = $this->supplier_tenant_id;

        $product_offer_inquiry->request_text = $this->request_text;
        $product_offer_inquiry->request_quantity = $this->request_quantity;

        $product_offer_inquiry->product_unit_id = $this->product_unit_id;
        $product_offer_inquiry->product_type_id = $this->product_type_id;

        $product_offer_inquiry->save();

        // Mail to tenant that offers the product
        //  Mail::to($offer_email)->send(new NewOfferInquiryMail($product_offer_inquiry));

        return redirect()
            ->route('product-offer-inquiries.index')
            ->with('message', 'Product Offer Request was created successfully.');

    }

    public function render()
    {
        return view('livewire.product-offer-inquiry.create-inquiry');
    }
}
