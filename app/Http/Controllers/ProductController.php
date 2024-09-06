<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\BaseProduct;
use App\Models\Document;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductUnit;
use App\Models\Standard;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        // Zeigt nur nicht gelöschte Produkte an

        $products = Product::whereNull('deleted_at')->latest()->paginate(10);
        $base_product = BaseProduct::all();
        return view('products.index', compact('products', 'base_product'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $product_types = ProductType::all();
        $base_products = BaseProduct::all();
        $product_units = ProductUnit::all();
        $standards = Standard::all();


        return view('products.create', compact('product_types', 'product_units', 'base_products', 'standards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, Product $model): RedirectResponse
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
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Product $product): View
    {

        $product_types = ProductType::all();
        $base_products = BaseProduct::all();
        $product_units = ProductUnit::all();
        $standards = Standard::all();



        return view('products.edit', compact('product', 'product_types', 'base_products', 'product_units', 'standards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->all());

        return redirect()
            ->route('products.index')
            ->with('message', '' . $product->name . ' was updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Überprüfen, ob das Produkt in irgendeiner Order verwendet wird
        if (OrderedProduct::where('product_id', $product->id)->exists()) {
            return redirect()->route('products.index')
                ->with('message', 'This product cannot be deleted because it is part of an existing order.');
        }

        // Produkt löschen
        $product->delete();

        return redirect()->route('products.index')
            ->with('message', 'Product was successfully deleted.');
    }

    public function destroyDocument(Product $product): RedirectResponse
    {

        //ddd($product);

        $document_id = $product->document_id;

        $product->document_id = null;
        $product->save();

        //ddd($product);

        //$document = Document::findOrFail($document_id)->first();

        Document::destroy($document_id);

        //ddd($document);

        //  $document->destroy();

        return redirect()
            ->route('products.index')
            ->with('message', 'Document was deleted successfully from product.');
    }
}
