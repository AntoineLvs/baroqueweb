<?php

namespace App\Http\Controllers;

use App\Models\ApiToken;
use App\Models\Invoice;
use App\Models\Settings;
use App\Models\Tenant;
use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\View\View;
use Spatie\FlareClient\Api;

class SettingsController extends Controller
{

    public function index(): View
    {
        $settings = User::orderBy('id', 'asc')->paginate(50);

        return view('settings.index', compact('settings'));
    }

    public function edit(User $setting): View
    {

        return view('settings.edit', compact('setting'));
    }


}
