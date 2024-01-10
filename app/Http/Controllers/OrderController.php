<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\PublicProductOffer;
use App\Scopes\TenantScope;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::paginate(25);

        return view('orders.index', compact('orders'));
    }

    public function create(): View
    {
        $products = Product::all();

        return view('orders.create', compact('products'));
    }

    public function createFromRequest($product_offer_request): View
    {
        $products = Product::all();

        return view('orders.create', compact('products'));
    }

    public function createFromHub($offer): View
    {

        $offer = PublicProductOffer::withoutGlobalScope(TenantScope::class)->find($offer);

        return view('orders.create', compact('offer'));
    }
}
