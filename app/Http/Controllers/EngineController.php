<?php

namespace App\Http\Controllers;

use App\Models\Engine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $engines = Engine::latest()->paginate(25);

        return view('engines.index', compact('engines'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('engines.create');
    }

    public function store(Request $request, Engine $model): RedirectResponse
    {
        $model->create($request->all());

        return redirect()
            ->route('engines.index')
            ->with('message', 'Engine was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Engine $engine): View
    {

        return view('engines.show', compact('engine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Engine $engine): View
    {

        return view('engines.edit', compact('engine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Engine $engine): RedirectResponse
    {
        $engine->update($request->all());

        return redirect()
            ->route('engines.index')
            ->with('message', 'Project was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Engine $engine): RedirectResponse
    {
        $engine->delete();

        return redirect()
            ->route('engines.index')
            ->with('message', 'engine was deleted successfully.');
    }

}
