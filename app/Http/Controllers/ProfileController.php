<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        if (Auth::check()) {
            $id = Auth::id();

        }

        return view('profile.edit');
    }

    /**
     * Update the profile
     */
    public function update(User $request)
    {
        ddd($request->all());

        auth()->user()->update($request->all());

        return back()->withStatus('Profile successfully updated.');
    }

    /**
     * Change the password
     */
    public function password(PasswordRequest $request): RedirectResponse
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus('Password successfully updated.');
    }
}
