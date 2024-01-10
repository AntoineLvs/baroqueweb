<?php

namespace App\Http\Controllers;

use App\Models\ProductType;

class ProductTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product_types = ProductType::latest()->paginate(10);
        return view('product-types.index', compact('product_types'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $product_types = ProductType::all();

        return view('product-types.create', compact('product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @param  App\ProductType  $model
     * @return \Illuminate\Http\Response
     */
    public function store(ProductType $request, ProductType $product_type)
    {
        //  ddd($request);
        //$request(all());

        $product_type->create($request->all());

        return redirect()
            ->route('product-types.index')
            ->with('message', '' . $product_type->name . ' was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $product_type)
    {
        return view('product-types.show', compact('product_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $product_type)
    {

        return view('product-types.edit', compact('product_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductType $request, ProductType $product_type)
    {
        $product_type->update($request->all());

        return redirect()
            ->route('product-types.index')
            ->with('message', '' . $product_type->name . ' was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductType  $product_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $product_type)
    {
    // emm todo Case Handling if Products exists

        $product_type->delete();

        return redirect()
            ->route('product-types.index')
            ->with('message', ' ' . $product_type->name . ' was deleted successfully.');
    }




}
