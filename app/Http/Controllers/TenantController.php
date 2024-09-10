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
        return view('tenant.index');
    }
}
