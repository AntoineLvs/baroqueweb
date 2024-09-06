<?php

namespace App\Mail\Order;

use App\Models\ProductOfferInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductInquiryCanceledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product_offer_inquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ProductOfferInquiry $product_offer_inquiry)
    {
        $this->product_offer_inquiry = $product_offer_inquiry;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {

        //ddd($this->product_offer_inquiry->offer($this->product_offer_inquiry->public_product_offer_id)->products);

        return $this->subject('New Product Inquiry # '.$this->product_offer_inquiry->id)->markdown('emails.product-inquiry.product-inquiry-canceled');
    }
}
