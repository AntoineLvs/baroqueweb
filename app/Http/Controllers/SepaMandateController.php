<?php

namespace App\Http\Controllers;

use App\Exports\SepaMandateExport;
use App\Models\SepaMandate;
use App\Models\TokenType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class SepaMandateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $sepa_mandates = SepaMandate::orderBy('id', 'asc')->paginate(50);
        $token_types = TokenType::all();

        return view('sepa-mandates.index', compact('sepa_mandates', 'token_types'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('sepa-mandates.create');
    }

    public function store(Request $request, SepaMandate $model): RedirectResponse
    {
        $model->create($request->all());

        return redirect()
            ->route('standards.index')
            ->with('message', 'Mandate was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(SepaMandate $mandate): View
    {

        return view('sepa-mandates.show', compact('mandate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(SepaMandate $sepa_mandate): View
    {

        return view('sepa-mandates.edit', compact('sepa_mandate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SepaMandate $mandate): RedirectResponse
    {
        $mandate->update($request->all());

        return redirect()
            ->route('sepa-mandates.index')
            ->with('message', 'Mandate was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SepaMandate $sepa_mandate)
    {
        $sepa_mandate->delete();

        return redirect()
            ->route('sepa-mandates.index')
            ->with('message', 'Mandate was deleted successfully.');
    }

    public function export()
    {
        return Excel::download(new SepaMandateExport, 'sepa-mandate.csv');
    }
}
