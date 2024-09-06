<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderType;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\PublicProductOffer;
use App\Models\Standard;
use App\Scopes\TenantScope;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::paginate(25);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Order $order): View
    {
        $order_types = OrderType::all();
        $order_statuses = OrderStatus::all();
        $product_units = ProductUnit::all();
        $standards = Standard::all();

        return view('orders.edit', compact('order', 'order_types', 'order_statuses', 'product_units', 'standards'));
    }



    public function create(): View
    {
        $products = Product::all();

        return view('orders.create', compact('products'));
    }

    public function destroy(Order $order)
    {
        // Lösche alle zugeordneten OrderedProducts der Bestellung
        $order->orderedProducts()->delete();

        // Lösche die Bestellung selbst
        $order->delete();

        // Setze eine Session-Message für den erfolgreichen Löschvorgang
        session()->flash('message', 'Die Bestellung und die zugehörigen Produkte wurden erfolgreich gelöscht.');

        // Leite den Benutzer zurück zur Bestellübersicht
        return redirect()->route('orders.index');
    }

    public function createProductRequest($productId): View
    {
        // Entferne den TenantScope und finde das Produkt manuell
        $product = Product::withoutGlobalScope(TenantScope::class)->find($productId);

        if (!$product) {
            // Wenn das Produkt nicht gefunden wird, gib eine 404-Seite zurück
            abort(404, 'Produkt nicht gefunden.');
        }

        return view('product-finder.public-product-request', compact('product'));
    }



}
