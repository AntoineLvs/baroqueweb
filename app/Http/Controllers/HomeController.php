<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOffer;
use App\Models\Project;
use App\Models\Supplier;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        if (! auth()->check()) {
            return view('welcome');

        } else {
            if (session()->has('tenant_id')) {

                $products = Product::paginate(5);
                $offers = ProductOffer::paginate(5);
                $projects = Project::paginate(5);
                $locations = Location::paginate(5);
                $orders = Order::paginate(5);

                return view('dashboard.dashboard',
                    ['products' => $products,
                        'projects' => $projects,
                    ]);

            }

            //  $suppliersCount = Supplier::count();
            $tenantCount = Tenant::count();
            $usersCount = User::count();

            return view('super.superdashboard', [
                //  'suppliersCount' => $suppliersCount,
                'usersCount' => $usersCount,
                'tenantCount' => $tenantCount,

            ]);
        }
    }
}
