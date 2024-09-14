<?php

namespace App\Http\Controllers;

use App\Exports\LocationsExport;
use App\Imports\DataImport;
use App\Imports\EventAttendeesImport;
use App\Imports\LocationsImport;
use App\Exports\EventAttendeesExport;
use App\Models\Event;
use App\Exports\EventsExport;
use App\Imports\EventsImport;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Exports\IdealCsvExport;
use App\Exports\IdealCsvTemplateExport;
use App\Imports\adminLocationsImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImportExportController extends Controller
{
    public function importExport()
    {
        return view('import');
    }


    public function importLocations(Request $request, $tenant_id): RedirectResponse
    {
        // Pass tenant_id to the import
        Excel::import(new LocationsImport($tenant_id), $request->file('file'));

        return redirect()
            ->route('locations.index')
            ->with('message', 'Locations were successfully imported.');
    }

    public function adminImportLocations(Request $request): RedirectResponse
    {
        // Pass tenant_id to the import
        Excel::import(new adminLocationsImport, $request->file('file'));

        return redirect()
            ->route('locations.index')
            ->with('message', 'Locations were successfully imported.');
    }

    public function exportLocations()
    {
        return Excel::download(new LocationsExport, 'locations.csv');
    }

    public function downloadTemplate()
    {
        return Excel::download(new IdealCsvTemplateExport, 'locations_template.csv');
    }


    public function importData(): View
    {

        return view('locations.import-data');
    }
}
