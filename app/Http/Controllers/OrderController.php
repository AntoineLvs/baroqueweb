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

    public function createProductRequest(Product $product): View
    {

        return view('product-finder.public-product-request', compact('product'));
    }



}
