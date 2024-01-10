<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\TenantType;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TenantController extends Controller
{
    public function index(): View
    {
        if (Auth::check()) {
            $id = Auth::id();

        }

        // $tenant_types = TenantType::all();

        //return view('tenant.edit');
        return view('tenant.edit');
    }
}
