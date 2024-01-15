<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseProductRequest;
use App\Models\BaseProduct;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BaseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $base_products = BaseProduct::latest()->paginate(10);

        return view('base-products.index', compact('base_products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $product_types = ProductType::all();

        return view('base-products.create', compact('product_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaseProductRequest $request, Product $model): RedirectResponse
    {
        //  ddd($request);
        //$request(all());

        $model->create($request->all());

        return redirect()
            ->route('base-products.index')
            ->with('message', 'Product was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(BaseProduct $base_product): View
    {
        return view('base-products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(BaseProduct $base_product): View
    {
        $product_types = ProductType::all();

        //ddd($baseproduct);
        return view('base-products.edit', compact('base_product', 'product_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BaseProductRequest $request, BaseProduct $base_product): RedirectResponse
    {
        $base_product->update($request->all());

        return redirect()
            ->route('base-products.index')
            ->with('message', 'Product was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BaseProduct $base_product): RedirectResponse
    {

        if ($base_product->document_id) {
            $this->destroyDocument($base_product);
        }

        $base_product->delete();

        return redirect()
            ->route('base-products.index')
            ->with('message', 'Product was deleted successfully.');
    }
}
