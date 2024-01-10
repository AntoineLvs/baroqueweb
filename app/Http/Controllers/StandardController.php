<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $standards = Standard::latest()->paginate(25);

        return view('standards.index', compact('standards'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('standards.create');
    }

    public function store(Request $request, Standard $model): RedirectResponse
    {
        $model->create($request->all());

        return redirect()
            ->route('standards.index')
            ->with('message', 'Standard was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Standard $engine): View
    {

        return view('standards.show', compact('standard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Standard $standard): View
    {

        return view('standards.edit', compact('standard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Standard $standard): RedirectResponse
    {
        $standard->update($request->all());

        return redirect()
            ->route('standards.index')
            ->with('message', 'Project was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Standard $standard): RedirectResponse
    {
        $standard->delete();

        return redirect()
            ->route('standards.index')
            ->with('message', 'standard was deleted successfully.');
    }
}
