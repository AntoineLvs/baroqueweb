<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Imports\EventAttendeesImport;
use App\Exports\EventAttendeesExport;
use App\Models\Event;
use App\Exports\EventsExport;
use App\Imports\EventsImport;


use Maatwebsite\Excel\Facades\Excel;
use Exception;

use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function importExport()
    {
        return view('import');
    }

    public function exportData()
    {
        return Excel::download(new DataExport, 'export.xlsx');
    }

    public function importData()
    {

        Excel::import(new DataImport, request()->file('file'));

        return redirect()
            ->route('admin.import-data')
            ->with('message', 'Daten wurden importiert.');

    }


    public function exportEventAttendees()
    {
        return Excel::download(new EventAttendeesExport, 'event-attendees.xlsx');
    }

    public function importEventAttendees($event)
    {

        try {
            Excel::import(new EventAttendeesImport, request()->file('file'), $event);
        } catch (Exception $e) {
            return $e;
        }



        return redirect()
            ->route('events.index')
            ->with('message', 'Event Teilnehmer wurden importiert.');

    }
}
