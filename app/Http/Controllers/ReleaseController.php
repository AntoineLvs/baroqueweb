<?php

namespace App\Http\Controllers;

use App\Models\Release;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $releases = Release::latest()->paginate(25);

        return view('releases.index', compact('releases'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('releases.create');
    }

    public function store(Request $request, Release $model): RedirectResponse
    {
        $model->create($request->all());

        return redirect()
            ->route('releases.index')
            ->with('message', 'Release was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Release $engine): View
    {

        return view('releases.show', compact('release'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Release $release): View
    {

        return view('releases.edit', compact('release'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Release $release): RedirectResponse
    {
        $release->update($request->all());

        return redirect()
            ->route('releases.index')
            ->with('message', 'Project was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Release $release): RedirectResponse
    {
        $release->delete();

        return redirect()
            ->route('releases.index')
            ->with('message', 'release was deleted successfully.');
    }
}
