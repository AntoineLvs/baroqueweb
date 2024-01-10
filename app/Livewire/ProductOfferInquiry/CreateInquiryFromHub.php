<?php

namespace App\Livewire\ProductOfferInquiry;

use App\Mail\ProductOffer\NewProductInquiryMail;
use App\Mail\ProductOffer\UserNewProductInquiryMail;
use App\Models\Product;
use App\Models\ProductOfferInquiry;
use App\Models\PublicProductOffer;
use Livewire\Component;
use Mail;

class CreateInquiryFromHub extends Component
{
    public $offer;

    public $product_offer_id;

    public $request_text;

    public $request_quantity;

    public function mount(PublicProductOffer $offer)
    {

        $this->offer = $offer;

    }

    public function submit()
    {

        $data = $this->validate([
            'request_text' => 'nullable|string|max:500',
            'request_quantity' => 'required',

        ]);

        // create new ProductOfferRequest
        $product_offer_inquiry = new ProductOfferInquiry;

        $product_offer_inquiry->public_product_offer_id = $this->offer->id;
        $product_offer_inquiry->supplier_tenant_id = $this->offer->tenant_id;

        $product_offer_inquiry->request_text = $this->request_text;
        $product_offer_inquiry->request_quantity = $this->request_quantity;

        $product_offer_inquiry->save();

        // find contact person

        $user = $this->offer->contact_person($this->offer->contact_person);
        $offer_email = $user->email;

        //$sender_email = $product_offer_inquiry->tenant->email;

        $sender_email = $product_offer_inquiry->tenant->email;

        // Mail to tenant that offers the product
        Mail::to($offer_email)->send(new NewProductInquiryMail($product_offer_inquiry));

        Mail::to($sender_email)->send(new UserNewProductInquiryMail($product_offer_inquiry));

        return redirect()
            ->route('product-offer-inquiries.index')
            ->with('message', 'Product Offer Request was created successfully.');

    }

    public function render()
    {
        return view('livewire.product-offer-inquiry.create-inquiry-from-hub');
    }
}
