<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use App\Models\BucketEntry;
use App\Models\ProductOfferInquiry;
use App\Models\PublicProductOffer;
use App\Models\Register;
use App\Models\Tenant;
use App\Scopes\TenantScope;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('hub.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     */
    public function show($offer): View
    {

        $product_offer = PublicProductOffer::withoutGlobalScope(TenantScope::class)->find($offer);

        return view('hub.show-offer', ['offer' => $product_offer]);
    }

    public function showInquiry($inquiry): View
    {

        $inquiry = ProductOfferInquiry::withoutGlobalScope(TenantScope::class)->find($inquiry);

        return view('hub.show-inquiry', ['inquiry' => $inquiry]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToBucket($offer)
    {

        $product_offer = PublicProductOffer::withoutGlobalScope(TenantScope::class)->find($offer);
        // ddd($product_offer->products);

        $tenant_id = auth()->user()->Tenant->id;

        if (Bucket::where('tenant_id', $tenant_id)->first() == null) {
            $bucket = new Bucket;
            $bucket->save();
        } else {
            $bucket = Bucket::where('tenant_id', $tenant_id)->first();
        }

        $bucket_entry = new BucketEntry;
        $bucket_entry->bucket_id = $bucket->id;
        $bucket_entry->product_offer_id = $product_offer->id;
        $bucket_entry->save();

        //  return view('hub.index');
        return back()->with('message', 'Offer was added to bucket.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }

    public function showMap(): View
    {

        $tenants = Tenant::all();

        return view('hub.map-finder', ['tenants' => $tenants]);
    }

    public function showProfileIndex(): View
    {

        $tenants = Tenant::all();

        return view('hub.show-profile-index', ['tenants' => $tenants]);
    }

    public function showPublicProfile($id): View
    {

        $tenant = Tenant::find($id)->get()->first();

        return view('hub.show-profile', ['tenant' => $tenant]);
    }
}
