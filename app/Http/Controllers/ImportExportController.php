<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Imports\EventAttendeesImport;
use App\Imports\LocationsImport;
use App\Exports\EventAttendeesExport;
use App\Models\Event;
use App\Exports\EventsExport;
use App\Imports\EventsImport;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


use Maatwebsite\Excel\Facades\Excel;
use Exception;

use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function importExport()
    {
        return view('import');
    }


    public function importLocation(): RedirectResponse
    {

        Excel::import(new LocationsImport, request()->file('file'));

        return redirect()
            ->route('locations.index')
            ->with('message', 'Locations wurden importiert.');
    }



    public function importData(): View
    {

        return view('locations.import-data');
    }
}
