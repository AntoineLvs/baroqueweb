@component('mail::message')
# New Product Request

You have a new product inquiry:

Customer:<br>
From: {{ $order->tenant->name }}<br>
E-Mail: {{ $order->tenant->email }}

Request Informations:<br>
{{  $order->customer_order_notice }}<br>

@component('mail::table')
| Product | Type    | Qty      | Unit        |
| :------ | :------ | :------- | :---------- |
@foreach ($order->orderedProducts as $orderedProduct)
| {{ $orderedProduct->product->name }} | {{ $orderedProduct->product->product_type->name }} | {{ $orderedProduct->product_quantity }} | {{ $orderedProduct->product_unit->name }} |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
