<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;


class RestrictTenantAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // Überprüfe, ob eine tenant_id in der Session vorhanden ist
        if (Auth::user()->get()->first()->isSuperAdmin() == false) {
            // Wenn eine tenant_id vorhanden ist, leite den Benutzer weiter oder zeige eine Fehlermeldung an
            return redirect()->route('home')->with('message', 'You do not have access to this resource.');
        }

        // Wenn keine tenant_id vorhanden ist, führe die Anfrage weiter
        return $next($request);
    }

}
