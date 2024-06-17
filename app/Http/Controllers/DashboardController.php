<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        if (Auth::check()) {
            $id = Auth::id();
        }

        $products = Product::all();
        $projects = Project::all();


        return view('dashboard.dashboard');

    }
}
