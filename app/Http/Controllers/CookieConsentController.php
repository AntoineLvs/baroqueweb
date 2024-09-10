<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieConsentController extends Controller
{
    public function checkCookie(Request $request)
    {
        $cookieIsSet = $request->cookie('cookie_consent');


        return $cookieIsSet;
    }



}
