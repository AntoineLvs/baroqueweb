<?php

namespace App\Http\Controllers;

use App\Mail\ProductOffer\ProductInquiryCanceledMail;
use App\Models\Product;
use App\Models\ProductOfferInquiry;
use App\Models\PublicProductOffer;
use App\Scopes\TenantScope;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mail;

class ProductOfferInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $product_offer_inquiries = ProductOfferInquiry::latest()->paginate(10);

        $product_offer_inquiries_in = ProductOfferInquiry::withoutGlobalScope(TenantScope::class)
            ->where('supplier_tenant_id', Auth::user()->tenant_id)
            ->latest()->paginate(5);

        //  ddd($product_offer_requests_in);

        return view('product-offer-inquiries.index', compact('product_offer_inquiries', 'product_offer_inquiries_in'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $products = Product::all();

        return view('product-offer-inquiries.create', compact('products'));
    }

    public function createNew($offer): View
    {

        $offer = PublicProductOffer::withoutGlobalScope(TenantScope::class)->find($offer);

        return view('product-offer-inquiries.create-from-hub', compact('offer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProductOffer $model): RedirectResponse
    {

        return redirect()
            ->route('product-offer-inquiries.index')
            ->with('message', 'Inquiry was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(ProductOfferInquiry $product_offer_inquiry): View
    {

        return view('product-offer-inquiries.show', compact('product_offer_inquiry'));
    }

    public function incomingShow($product_offer_inquiry_id): View
    {

        $product_offer_inquiry = ProductOfferInquiry::withoutGlobalScope(TenantScope::class)->find($product_offer_inquiry_id);

        return view('product-offer-inquiries.show-incoming', compact('product_offer_inquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(ProductOfferInquiry $product_offer_requests): View
    {
        $products = Product::all();

        return view('product-offer-inquiries.edit', compact('product_offer_inquiry', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Product  $product
     */
    public function update(ProductOfferRequest $request, ProductOffer $product_offer_requests): RedirectResponse
    {
        $product_offer_requests->update($request->all());

        return redirect()
            ->route('product-offers.index')
            ->with('message', 'Product Offer was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductOffer  $product_offer_requests
     */
    public function destroy(ProductOfferInquiry $product_offer_inquiry): RedirectResponse
    {
        $product_offer_inquiry->delete();

        return redirect()
            ->route('product-offer-inquiries.index')
            ->with('message', 'Product Inquiry was deleted successfully.');
    }

    public function cancel(ProductOfferInquiry $product_offer_inquiry): RedirectResponse
    {
        $product_offer_inquiry->inquiry_status = 9;
        $product_offer_inquiry->save();

        // Send the mails
        if ($product_offer_inquiry->supplier_tenant_id) {
            ddd($supplier_email = $product_offer_inquiry->supplier($product_offer_inquiry->suppplier_tenant_id));

            Mail::to($supplier_email)->send(new ProductInquiryCanceledMail($product_offer_inquiry));
        }
        $tenant_email = $product_offer_inquiry->tenant->email;
        Mail::to($tenant_email)->send(new ProductInquiryCanceledMail($product_offer_inquiry));

        return redirect()
            ->route('product-offer-inquiries.index')
            ->with('message', 'Product Inquiry was canceled successfully.');
    }

    public function finalize(PriceOffer $priceoffer)
    {
        $priceoffer->total_amount = $priceoffer->products->sum('total_amount');

        foreach ($priceoffer->products as $priceoffered_product) {
            $product_name = $priceoffered_product->product->name;
            $product_stock = $priceoffered_product->product->stock;

        }

        foreach ($priceoffer->products as $priceoffered_product) {

            $priceoffered_product->product->save();
        }

        $priceoffer->finalized_at = Carbon::now()->toDateTimeString();

        $priceoffer->save();
        $priceoffer->client->save();

        $this->mailPriceOffer($priceoffer);
        //Mail::to('7a74b22721-9728a7@inbox.mailtrap.io')->send(new PriceRequestMail());

        return back()->withStatus('Das Angebot wurde versendet!');
    }
}
