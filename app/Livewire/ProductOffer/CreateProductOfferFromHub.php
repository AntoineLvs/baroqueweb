<?php

namespace App\Livewire\ProductOffer;

use App\Models\Document;
use App\Models\OfferedProduct;
use App\Models\Product;
use App\Models\ProductOffer;
use App\Models\ProductUnit;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProductOfferFromHub extends Component
{
    use WithFileUploads;

    public $search = '';

    public $file;

    public $files = [];

    public $document_type = 4;

    public $informations;

    public $date_valid;

    public $date;

    public $users;

    public $contact_person;

    public $offered_product;

    public $product_id = '';

    public $products;

    public $customer_tenant_id;

    public $customer_tenants;

    public $product_unit_id = 1;

    public $product_units;

    public $allProducts = [];

    public $product_price;

    public $product_tax = 0.19;

    public $product_quantity;

    public $product_offer_inquiry;

    public function mount()
    {

        $this->allProducts = Product::all();

        $this->product_units = ProductUnit::all();

        $this->users = User::all();

        $this->contact_person = Auth::user()->id;

        $this->customer_tenants = Tenant::where('id', '!=', Auth::user()->tenant_id)->get();

        if ($this->product_offer_inquiry) {
            $product_offer_inquiry = $this->product_offer_inquiry;
            $this->customer_tenant_id = $this->product_offer_inquiry->tenant_id;
        }

    }

    public function submit()
    {

        $data = $this->validate([
            'informations' => 'nullable|string|max:500',
            'file' => 'nullable|file|mimes:pdf|max:9024',

            'date_valid' => 'required',
            'contact_person' => 'required',
            'customer_tenant_id' => 'required',
            'offered_product' => 'required',
            'product_unit_id' => 'required',
            'product_quantity' => 'required|integer',
            'product_price' => 'required',
            'product_tax' => 'required',

        ]);

        // create new Offer
        $productOffer = new ProductOffer;

        // change active status and add attributes

        $productOffer->informations = $this->informations;

        if ($this->contact_person == null) {
            $user = Auth::user();
            $productOffer->contact_person = $user->id;
        } else {
            $productOffer->contact_person = $this->contact_person;
        }

        $productOffer->customer_tenant_id = $this->customer_tenant_id;

        // format the date
        $formatted_date = Carbon::parse($this->date_valid)->format('Y-m-d H:i:s');
        $productOffer->date_valid = $formatted_date;

        //ddd($formatted_date);

        // Create Files
        if ($this->file) {
            $document = $this->createDocument($this->file);
            $productOffer->document_id = $document->id;
        }

        //ddd($productOffer);
        // save and refresh
        $productOffer->save();
        $productOffer->fresh();

        // CREATE ALL THE OFFERED PRODUCTS

        $offeredProduct = new OfferedProduct;
        $offeredProduct->product_offer_id = $productOffer->id;
        $offeredProduct->product_id = $this->offered_product;

        $offeredProduct->product_quantity = $this->product_quantity;
        $offeredProduct->product_price = $this->product_price;
        $offeredProduct->product_unit_id = $this->product_unit_id;
        $offeredProduct->product_tax = $this->product_tax;
        $offeredProduct->created_at = Carbon::now();
        $offeredProduct->updated_at = Carbon::now();

        // Change the Status of the product Inquiry and add a product offer id
        if ($this->product_offer_inquiry) {
            $this->product_offer_inquiry->status = 1;
            $this->product_offer_inquiry->product_offer_id = $productOffer->id;

            $this->product_offer_inquiry->save();

        }

        $offeredProduct->save();
        $productOffer->save();

        // SEND THE EMAILS TODO

        return redirect()
            ->route('product-offers.index')
            ->with('message', 'Product Offer was created successfully.');

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
        return view('livewire.product-offer.create-product-offer-from-hub', [
            'products' => $this->products,
        ]
        );
    }
}
