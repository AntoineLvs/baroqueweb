<?php

namespace App\Http\Controllers;

use App\Models\Engine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function efueltoday(): View
    {

        $ci_color_1 = 'rgb(86 104 165)';

        return view('tenant-subsites.check-efueltoday', compact('ci_color_1'));
    }


    public function sprint(): View
    {

        $ci_color_1 = 'rgb(138 9 35)';

        return view('tenant-subsites.check-sprint', compact('ci_color_1'));

    }

}
