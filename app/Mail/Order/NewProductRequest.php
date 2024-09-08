<?php

namespace App\Mail\Order;

use App\Models\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProductRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $ordered_products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->ordered_products = $order->orderedProducts;
        //ddd($this->ordered_products);

    }

    /**
     * Build the message.
     */
    public function build(): static
    {

        return $this->subject('New Product Request # '.$this->order->id)->markdown('emails.order.new-product-request');
    }
}
