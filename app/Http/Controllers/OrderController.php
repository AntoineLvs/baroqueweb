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
use Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /* public function index(): View
    {

        if(Auth::user()->tenant_id)
        {
            $tenantId = Auth::user()->tenant_id;

            $orders = Order::withoutGlobalScope(TenantScope::class)->where('tenant_id', $tenantId)->orWhere('to_tenant_id', $tenantId)->paginate(25);

            //ddd($orders);
        }
        else
        {
            $orders = Order::paginate(25);
        }


        return view('orders.index', compact('orders'));
    }*/

    public function index(): View
    {
        if (session('tenant_id')) {
            $tenantId = session('tenant_id');
            $orders = Order::withoutGlobalScope(TenantScope::class)
                ->where('tenant_id', $tenantId)
                ->orWhere('to_tenant_id', $tenantId)
                ->with(['orderedProducts' => function ($query) {
                    $query->withoutGlobalScope(TenantScope::class);
                }])
                ->paginate(25);
        } else {
            // This will load every orders and their products without the TenantScope
            $orders = Order::with(['orderedProducts' => function ($query) {
                $query->withoutGlobalScope(TenantScope::class);
            }])->paginate(25);
        }

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


    /**
     * Show the shwo view of the specified resource.
     */
    public function show(Order $order)
    {

        return view('orders.show', compact('order'));
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

    public function createProductRequest($productId, Request $request): View
    {
        // Récupère le produit sans le TenantScope
        $product = Product::withoutGlobalScope(TenantScope::class)->find($productId);

        if (!$product) {
            abort(404, 'Produit non trouvé.');
        }

        // Récupérer les valeurs de l'URL
        $quantity = $request->get('quantity', 0); 
        $selectedUnit = $request->get('unit', null); 

        return view('product-finder.public-product-request', compact('product', 'quantity', 'selectedUnit'));
    }
}
