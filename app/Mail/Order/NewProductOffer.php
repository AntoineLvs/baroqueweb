<?php

namespace App\Mail\Order;

use App\Models\Order;

use App\Models\OrderedProduct;
use App\Scopes\TenantScope;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProductOffer extends Mailable
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
       // $this->ordered_products = $order->orderedProducts();

        // Lade die Ordered Products ohne den TenantScope
        $this->ordered_products = OrderedProduct::withoutGlobalScope(TenantScope::class)
            ->where('order_id', $this->order->id)
            ->get();


    }

    /**
     * Build the message.
     */
    public function build(): static
    {
       // return $this->subject('New Offer # ' . $this->order->id)->markdown('emails.order.new-product-offer');

        return $this->subject('New Offer # ' . $this->order->id)
            ->markdown('emails.order.new-product-offer')
            ->with([
                'order' => $this->order,
                'ordered_products' => $this->ordered_products,
            ]);


    }
}
