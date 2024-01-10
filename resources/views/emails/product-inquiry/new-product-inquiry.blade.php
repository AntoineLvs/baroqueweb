@component('mail::message')
# New Product Inquiry

You have a new product inquiry:

Customer:<br>
From: {{ $product_offer_inquiry->tenant->name }}<br>
E-Mail: {{ $product_offer_inquiry->tenant->email }}

Request Informations:<br>
Additional Text: {{  $product_offer_inquiry->request_text }}<br>
Quantity: {{  $product_offer_inquiry->request_quantity }}<br>


@component('mail::table')
| Product | Type    | Qty      | Unit        | Price      |
| :------ | :------ | :------- | :---------- | :--------- |
@foreach ($product_offer_inquiry->offer($product_offer_inquiry->public_product_offer_id)->products as $p)
| {{ $p->product->name }} | {{ $p->product->product_type->name }} | {{ $p->product_quantity }} | {{ $p->product_unit->name }} | {{ $p->product_price }} € |
@endforeach
@endcomponent


@component('mail::button', ['url' => 'http://localhost/hofhub/public/product-offer-inquiries/' . $product_offer_inquiry->id, 'color' => 'success'])
Show
@endcomponent




Thanks,<br>
{{ config('app.name') }}
@endcomponent
