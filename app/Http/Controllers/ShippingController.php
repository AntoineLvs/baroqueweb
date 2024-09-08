<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderType;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\PublicProductOffer;
use App\Models\Shipping;
use App\Models\ShippingStatus;
use App\Models\Standard;
use App\Scopes\TenantScope;
use Auth;
use Illuminate\View\View;

class ShippingController extends Controller
{

    public function index(): View
    {

        $shippings = Shipping::latest()->paginate(25);
        return view('shippings.index', compact('shippings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Shipping $shipping): View
    {

        $shipping_statuses = ShippingStatus::all();


        return view('shippings.edit', compact('shipping', 'shipping_statuses'));
    }


    /**
     * Show the shwo view of the specified resource.
     */
    public function show(Shipping $shipping)
    {

        return view('shipping.show', compact('shipping'));
    }




    public function create(): View
    {


        return view('shippings.create');
    }

    public function destroy(Shipping $shipping)
    {
        // Lösche alle zugeordneten OrderedProducts der Bestellung
        $shipping->shippedProducts()->delete();

        // Lösche die Bestellung selbst
        $shipping->delete();

        // Setze eine Session-Message für den erfolgreichen Löschvorgang
        session()->flash('message', 'Die Bestellung und die zugehörigen Produkte wurden erfolgreich gelöscht.');

        // Leite den Benutzer zurück zur Bestellübersicht
        return redirect()->route('shippings.index');
    }




}
