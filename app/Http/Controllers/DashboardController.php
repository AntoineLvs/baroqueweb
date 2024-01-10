<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        if (Auth::check()) {
            $id = Auth::id();
        }

        return view('dashboard.dashboard');

    }
}
