<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update($request->all());

        return redirect()
            ->route('api-dashboard.index')
            ->with('message', 'Your Request has been enregistred, please wait until our admin team review it and answer it.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(User $user): View
    {

        return view('users.edit-user', compact('user'));
    }

    public function editTenant(Tenant $tenant, User $user): View
    {

        return view('users.edit-tenant', compact('tenant', 'user'));
    }


    public function createNewTenantUser(): View
    {
        return view('users.create-new-tenant-user');
    }
}
