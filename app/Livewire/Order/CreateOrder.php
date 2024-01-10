<?php

namespace App\Livewire\Order;

use App\Models\Document;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOrder extends Component
{
    use WithFileUploads;

    public $search = '';

    public $file;

    public $files = [];

    public $document_type = 4;

    public $informations;

    public $date_valid;

    public $date;

    public $offer;

    public $users;

    public $contact_person;

    public $offered_product;

    public $product_id = '';

    public $products;

    public $customer_tenant_id;

    public $customer_tenant;

    public $product_unit_id = 1;

    public $product_units;

    public $allProducts = [];

    public $ordered_products;

    public $product_price;

    public $product_tax = 0.19;

    public $product_quantity;

    public $product_offer_inquiry;

    public function mount($offer)
    {

        $this->offer = $offer;

        $this->allProducts = Product::all();

        $this->product_units = ProductUnit::all();

        $this->users = User::all();

        $this->contact_person = Auth::user()->id;

        $this->customer_tenants = Tenant::where('id', '!=', Auth::user()->tenant_id)->get();

        if ($this->product_offer_inquiry) {
            $product_offer_inquiry = $this->product_offer_inquiry;
            $this->customer_tenant_id = $this->product_offer_inquiry->tenant_id;
        }

        if ($this->offer) {
            $customer_tenant = Tenant::find($offer->tenant_id);
            $this->customer_tenant = $customer_tenant;

            $this->ordered_products = $offer->products;

            foreach ($this->ordered_products as $product) {
                $this->product_price = $product->product_price;
                $this->product_quantity = $product->product_quantity;
                $this->product_unit_id = $product->product_unit_id;
                $this->product_tax = $product->product_tax;
                $this->product_id = $product->product_id;
            }

        }

    }

    public function submit()
    {

        $data = $this->validate([
            'informations' => 'nullable|string|max:500',
            'file' => 'nullable|file|mimes:pdf|max:9024',

            'product_unit_id' => 'required',
            'product_quantity' => 'required|integer',
            'product_price' => 'required',
            'product_tax' => 'required',

        ]);

        // create new Offer
        $order = new Order;

        // change active status and add attributes

        $order->informations = $this->informations;

        if ($this->contact_person == null) {
            $user = Auth::user();
            $order->contact_person = $user->id;
        } else {
            $order->contact_person = $this->contact_person;
        }

        $order->customer_tenant_id = $this->offer->tenant_id;

        // format the date
        // $formatted_date = Carbon::parse($this->date_valid)->format('Y-m-d H:i:s');;
        // $order->date_valid = $formatted_date;

        //ddd($formatted_date);

        // Create Files
        if ($this->file) {
            $document = $this->createDocument($this->file);
            $order->document_id = $document->id;
        }

        //ddd($order);
        // save and refresh
        $order->save();
        $order->fresh();

        // CREATE ALL THE OFFERED PRODUCTS

        $orderedProduct = new OrderedProduct;
        $orderedProduct->order_id = $order->id;
        $orderedProduct->product_id = $this->product_id;

        $orderedProduct->product_quantity = $this->product_quantity;
        $orderedProduct->product_price = $this->product_price;
        $orderedProduct->product_unit_id = $this->product_unit_id;
        $orderedProduct->product_tax = $this->product_tax;
        $orderedProduct->created_at = Carbon::now();
        $orderedProduct->updated_at = Carbon::now();

        // Change the Status of the product Inquiry and add a product offer id
        if ($this->product_offer_inquiry) {
            $this->product_offer_inquiry->status = 1;
            $this->product_offer_inquiry->product_offer_id = $order->id;

            $this->product_offer_inquiry->save();

        }

        $orderedProduct->save();
        $order->save();

        // SEND THE EMAILS TODO

        return redirect()
            ->route('orders.index')
            ->with('message', 'Order was created successfully.');

    }

    public function createDocument($file)
    {

        //$filename = $file->store('documents', 's3-public');

        $user = Auth::user();

        // filename - docname_1773271717732.pdf
        $filename = pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME)
        .'_'.now()->timestamp.'.'.$this->file->getClientOriginalExtension();

        // store private s3
        $this->file->storeAs('/documents/'.$user->tenant_id.'/', $filename, 's3');

        // create document in db
        $document = Document::create([
            'document_type_id' => $this->document_type,
            'user_id' => $user->id,
            'data' => $this->informations,
            'filename' => $filename,
            'extension' => $this->file->getClientOriginalExtension(),
            'size' => $this->file->getSize(),
        ]);

        return $document;
    }

    public function render()
    {
        return view('livewire.order.create-order', [
            'products' => $this->products,
        ]
        );
    }
}
