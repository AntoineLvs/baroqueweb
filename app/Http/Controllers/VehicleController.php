<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $vehicles = Vehicle::latest()->paginate(25);

        return view('vehicles.index', compact('vehicles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('vehicles.create');
    }

    public function store(Request $request, Vehicle $model): RedirectResponse
    {
        $model->create($request->all());

        return redirect()
            ->route('vehicles.index')
            ->with('message', 'Vehicle was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Vehicle $vehicle): View
    {

        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Vehicle $vehicle): View
    {

        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle): RedirectResponse
    {
        $vehicle->update($request->all());

        return redirect()
            ->route('vehicles.index')
            ->with('message', 'Vehicle was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with('message', 'Vehicle was deleted successfully.');
    }
}
