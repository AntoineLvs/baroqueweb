@component('mail::message')
# Product Inquiry

You send a new product inquiry to

Supplier:<br>
From: {{ $product_offer_inquiry->supplier($product_offer_inquiry->supplier_tenant_id)->name }}<br>
E-Mail: {{ $product_offer_inquiry->supplier($product_offer_inquiry->supplier_tenant_id)->email }}

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



Thanks,<br>
{{ config('app.name') }}
@endcomponent
