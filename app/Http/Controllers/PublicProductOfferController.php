<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductOfferRequest;
use App\Models\Product;
use App\Models\ProductOfferInquiry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicProductOfferController extends Controller
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
        $product_offers_public = ProductOfferPublic::latest()->paginate(25);

        return view('product-offers.index', compact('product_offers_public'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $products = Product::all();

        return view('product-offers.create', compact('products'));
    }

    public function createFromInquiry($product_offer_inquiry_id): View
    {

        $product_offer_inquiry = ProductOfferInquiry::find($product_offer_inquiry_id);

        ddd($product_offer_inquiry);

        $products = Product::all();

        return view('product-offers.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProductOffer $model): RedirectResponse
    {

        // $productOffer = $model->create($request->all());
        //
        // $product = Product::find($request->product_id);
        //
        // $offeredProduct = new OfferedProduct;
        //
        // $offeredProduct->name = $product->name;
        // $offeredProduct->product_id = $product->id;
        // $offeredProduct->product_type_id = $product->product_type_id;
        // $offeredProduct->data = $product->data;
        //
        // $offeredProduct->product_offer_id = $productOffer->id;
        //
        //
        // $offeredProduct->save();

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
        // $solds = $product->solds()->latest()->limit(25)->get();
        //
        // $receiveds = $product->receiveds()->latest()->limit(25)->get();
        //
        // $pricerequestedproducts = $product->pricerequests()->latest()->limit(25)->get();
        //
        // $purchases = $product->purchases()->latest()->limit(25)->get();

        return view('product-offers.show', compact('product_offer', 'solds', 'receiveds', 'pricerequestedproducts', 'purchases'));
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
