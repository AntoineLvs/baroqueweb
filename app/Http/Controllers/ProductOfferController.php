<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductOfferRequest;
use App\Models\Product;
use App\Models\ProductOffer;
use App\Models\ProductOfferInquiry;
use App\Models\PublicProductOffer;
use App\Models\User;
use App\Scopes\TenantScope;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //  ddd(auth()->user()->tenant_id);

        // if(session()->has('tenant_id')) {
        //
        //   $tenant_id = auth()->user()->tenant_id;
        //   $products = Product::where('tenant_id', $tenant_id)->paginate(25);
        //   return view('product_offers.index', compact('products'));
        // }
        //
        // else {
        $product_offers = ProductOffer::latest()->paginate(25);

        $public_product_offers = PublicProductOffer::latest()->paginate(25);

        return view('product-offers.index', compact('product_offers', 'public_product_offers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $products = Product::all();

        return view('product-offers.create', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPublic(): View
    {
        $products = Product::all();

        return view('product-offers.create-public', compact('products'));
    }

    public function createNew($inquiry): View
    {

        $inquiry = ProductOfferInquiry::withoutGlobalScope(TenantScope::class)->find($inquiry);

        $products = Product::all();

        return view('product-offers.create-from-hub', compact('inquiry', 'products'));
    }

    public function createFromInquiry($product_offer_inquiry_id): View
    {

        $product_offer_inquiry = ProductOfferInquiry::withoutGlobalScope(TenantScope::class)->find($product_offer_inquiry_id);

        $products = Product::all();

        return view('product-offers.create-inquiry', compact('products', 'product_offer_inquiry'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProductOffer $model): RedirectResponse
    {

        return redirect()
            ->route('product-offers.index')
            ->with('message', 'ProductOffer was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(ProductOffer $product_offer): View
    {

        return view('product-offers.show', compact('product_offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(ProductOffer $product_offer): View
    {
        $products = Product::all();

        return view('product-offers.edit', compact('product_offer', 'products'));
    }

    public function editPublic(PublicProductOffer $product_offer): View
    {
        $products = Product::all();

        return view('product-offers.edit-public', compact('product_offer', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Product  $product
     */
    public function update(ProductOfferRequest $request, ProductOffer $product_offer): RedirectResponse
    {
        $product_offer->update($request->all());

        return redirect()
            ->route('product-offers.index')
            ->with('message', 'Product Offer was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductOffer $product_offer): RedirectResponse
    {
        $product_offer->delete();

        return redirect()
            ->route('product-offers.index')
            ->with('message', 'Product Offer was deleted successfully.');
    }

    public function destroyPublicOffer(PublicProductOffer $product_offer): RedirectResponse
    {
        $product_offer->delete();

        return redirect()
            ->route('product-offers.index')
            ->with('message', 'Product Offer was deleted successfully.');
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
