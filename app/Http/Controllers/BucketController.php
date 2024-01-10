<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\BucketEntry;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BucketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $bucket_entries = BucketEntry::paginate(25);

        return view('bucket.index', compact('bucket_entries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $model): RedirectResponse
    {
        //  ddd($request);
        //$request(all());

        $model->create($request->all());

        return redirect()
            ->route('products.index')
            ->with('message', 'Product was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Product $product): View
    {

        return view('bucket.show', compact('product', 'solds', 'receiveds', 'pricerequestedproducts', 'purchases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Product $product): View
    {
        $product_types = ProductType::all();

        return view('bucket.edit', compact('product', 'product_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->all());

        return redirect()
            ->route('products.index')
            ->with('message', 'Product was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('bucket.index')
            ->with('message', 'Product was deleted successfully.');
    }
}
