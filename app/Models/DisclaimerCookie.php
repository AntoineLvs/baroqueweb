<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Justijndepover\CookieConsent\Concerns\InteractsWithCookies;

class DisclaimerCookie extends Model
{

    use InteractsWithCookies; // add this line

}
