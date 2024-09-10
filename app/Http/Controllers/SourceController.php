<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Imports\SourcesImport;
use App\Models\Source;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class SourceController extends Controller
{
    public function index()
    {

        $sources = Source::orderBy('id', 'asc')->paginate(50);

        return view('sources.index', compact('sources'));

    }

    public function sourcesList()
    {

        $sources = Source::orderBy('id', 'asc')->paginate(50);

        return view('sources.sources-list', compact('sources'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('sources.create');
    }

    public function store(Request $request, Source $model): RedirectResponse
    {
        $model->create($request->all());

        return redirect()
            ->route('sources.index')
            ->with('message', 'Source was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Source $source): View
    {

        return view('sources.show', compact('source'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Source $source)
    {

        return view('sources.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Source $source): RedirectResponse
    {
        $source->update($request->all());

        return redirect()
            ->route('sources.index')
            ->with('message', 'Source was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Source $source): RedirectResponse
    {
        $source->delete();

        return redirect()
            ->route('sources.index')
            ->with('message', 'Source was deleted successfully.');
    }

    public function importExportView()
    {
        return view('sources.import-export');
    }
    public function import()
    {

        Excel::import(new SourcesImport, request()->file('file'));

        return redirect()
            ->route('sources.index')
            ->with('message', 'Daten wurden importiert.');
    }


}
