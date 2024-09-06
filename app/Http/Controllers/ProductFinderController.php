<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Tenant;
use App\Scopes\TenantScope;



class ProductFinderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $products = Product::withoutGlobalScope(TenantScope::class)
            ->where('active', 1)
            ->get();


        return view('product-finder.index', ['products' => $products]);
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
