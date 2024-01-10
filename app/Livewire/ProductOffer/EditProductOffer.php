<?php

namespace App\Livewire\ProductOffer;

use App\Models\Document;
use App\Models\OfferedProduct;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductOffer extends Component
{
    use WithFileUploads;

    public $search = '';

    public $file;

    public $files = [];

    public $document_type = 4;

    public $informations;

    public $date_valid;

    public $date;

    public $isActive;

    public $users;

    public $contact_person;

    public $customer_tenant_id;

    public $customer_tenants;

    public $product_id;

    public $products;

    public $allProducts = [];

    public $product_price = '';

    public $product_tax;

    public $product_unit_id = 1;

    public $product_units;

    public $product_quantity = '';

    public $product_offer;

    public $offered_product;

    public $offered_product_id;

    public function mount($product_offer)
    {
        $this->allProducts = Product::all();
        $this->users = User::all();

        $this->product_units = ProductUnit::all();

        // mount the offer
        $this->product_offer = $product_offer;

        // product offer values
        $this->informations = $product_offer->informations;
        $this->date_valid = $product_offer->date_valid;
        $this->isActive = $product_offer->active;
        $this->contact_person = $product_offer->contact_person;

        $this->customer_tenants = Tenant::where('id', '!=', Auth::user()->tenant_id)->get();
        $this->customer_tenant_id = $product_offer->customer_tenant_id;

        // get offered product
        $offered_product = OfferedProduct::where('product_offer_id', $product_offer->id)->get()->first();
        $this->offered_product = $offered_product;
        $this->offered_product_id = $offered_product->product_id;

        $this->product_unit_id = $offered_product->product_unit_id;

        $this->product_price = $offered_product->product_price;
        $this->product_tax = $offered_product->product_tax;
        $this->product_unit = $offered_product->product_unit;
        $this->product_quantity = $offered_product->product_quantity;

    }

    public function update()
    {
        $data_array = $this->validate([
            'informations' => 'nullable|string|max:500',
            'file' => 'nullable|file|mimes:pdf|max:9024',
            'isActive' => 'required',
            'date_valid' => 'required|date',
            'contact_person' => 'nullable',

            'offered_product' => 'required',
            'product_unit_id' => 'required',
            'product_quantity' => 'required|integer',
            'product_price' => 'nullable',
            'product_tax' => 'required',
        ]);

        //ddd($this->product_price);

        // Update offer props
        $this->product_offer->informations = $this->informations;
        $this->product_offer->active = $this->isActive;
        $this->product_offer->contact_person = $this->contact_person;

        // format the date
        $formatted_date = Carbon::parse($this->date_valid)->format('Y-m-d H:i:s');
        $this->product_offer->date_valid = $formatted_date;

        // update product props
        $this->offered_product->product_id = $this->offered_product_id;
        $this->offered_product->product_unit_id = $this->product_unit_id;
        $this->offered_product->product_price = $this->product_price;
        $this->offered_product->product_tax = $this->product_tax;
        $this->offered_product->product_quantity = $this->product_quantity;

        $this->product_offer->save();
        $this->offered_product->save();

        if ($this->file) {
            $document = $this->createDocument($this->file);
            $productOffer->document_id = $document->id;
        }

        $this->product_offer->save();

        return redirect()
            ->route('product-offers.index')
            ->with('message', 'Product Offer was created successfully.');

    }

    public function createDocument($file)
    {
        $filename = $file->store('documents', 's3-public');

        $user = Auth::user();

        // filename - docname_1773271717732.pdf
        $filename = pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME)
        .'_'.now()->timestamp.'.'.$this->file->getClientOriginalExtension();

        // store private s3
        $this->file->storeAs('/documents/'.$user->id.'/', $filename, 's3');

        // create document in db
        $document = Document::create([
            'document_type_id' => $this->document_type,
            'user_id' => $user->id,
            'data' => $this->data,
            'filename' => $filename,
            'extension' => $this->file->getClientOriginalExtension(),
            'size' => $this->file->getSize(),
        ]);

        return $document;
    }

    public function render()
    {
        return view('livewire.product-offer.edit-product-offer', [
            'product' => $this->offered_product,
        ]

        );
    }
}
