<?php

namespace App\Mail\Order;

use App\Models\Order;
use App\Models\ProductOfferInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProductRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {

        //ddd($this->product_offer_inquiry->offer($this->product_offer_inquiry->public_product_offer_id)->products);

        return $this->subject('New Product Inquiry # '.$this->product_offer_inquiry->id)->markdown('emails.product-inquiry.new-product-inquiry');
    }
}
