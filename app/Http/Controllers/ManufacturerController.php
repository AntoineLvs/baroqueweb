<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $manufacturers = Manufacturer::latest()->paginate(25);

        return view('manufacturers.index', compact('manufacturers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('manufacturers.create');
    }

    public function store(Request $request, Manufacturer $model): RedirectResponse
    {
        $model->create($request->all());

        return redirect()
            ->route('manufacturers.index')
            ->with('message', 'Man was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Manufacturer $manufacturer): View
    {

        return view('$manufacturers.show', compact('manufacturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Manufacturer $manufacturer): View
    {

        return view('manufacturers.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manufacturer $manufacturer): RedirectResponse
    {
        $manufacturer->update($request->all());

        return redirect()
            ->route('manufacturers.index')
            ->with('message', 'Project was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer): RedirectResponse
    {
        $manufacturer->delete();

        return redirect()
            ->route('manufacturers.index')
            ->with('message', 'Manufacturer was deleted successfully.');
    }
}
