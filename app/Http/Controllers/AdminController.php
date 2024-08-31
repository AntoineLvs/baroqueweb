<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteOnMapbox;
use App\Jobs\PushToMapbox;
use App\Models\Location;
use App\Models\ProductType;
use App\Models\BaseService;
use App\Models\BaseProduct;
use App\Models\Standard;
use App\Models\MapboxRecord;

use App\Scopes\TenantScope;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Aws\S3\S3Client;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $all_locations = Location::all();

        $product_types = ProductType::latest()->paginate(10);
        $base_services = BaseService::latest()->paginate(10);
        $base_products = BaseProduct::latest()->paginate(10);
        $standards = Standard::latest()->paginate(10);


        //ddd($locations);
        return view('admin.dashboard', [
            'all_locations' => $all_locations,
            'product_types' => $product_types,
            'base_services' => $base_services,
            'base_products' => $base_products,
            'standards' => $standards,


        ]);
    }


    //Here we have 3 functions for the queues: the first two are to put locations into queue, and change the status and verified, to be sure that for example,
    // a disabled location won't be able on Find table (as we call only active locations). 
    //The last one is to manage the "Push All" button, to make sure that every locations go into the right queue.
    public function queueLocation(Request $request, Location $location)
    {
        //the location is sent to mapbox_records table, in a queue. You can then manage the jobs of this queue by going in app/jobs/PushToMapbox
        PushToMapbox::dispatch($location->id)->onQueue('mapbox_create');

        $message = '' . $location->name . ' has been added to the Mapbox queue successfully, please be aware that there will be some time before your location appears online';

        $location->verified = 1;
        $location->status = 2;
        $location->save();

        return back()->with('message', $message);
    }

    public function disableLocation(Request $request, Location $location)
    {
        PushToMapbox::dispatch($location)->onQueue('mapbox_disable');

        $message = '' . $location->name . ' has been added to the Mapbox queue successfully, please be aware that there will be some time before your location disappears online';

        $location->status = 5;

        $location->save();

        return back()->with('message', $message);
    }

    public function queueAllLocations(Location $location)
    {
        $locations = Location::withoutGlobalScope(TenantScope::class)->get();

        foreach ($locations as $location) {
            foreach ($locations as $location) {
                if ($location->active == 1 && $location->verified == 0 && ($location->status == 0 || $location->status == 1)) {
                    PushToMapbox::dispatch($location->id)->onQueue('mapbox_create');

                    $location->verified = 1;
                    $location->status = 2;
                    $location->save();
                } elseif ($location->active == 0 && $location->verified == 1 && $location->status == 4) {

                    PushToMapbox::dispatch($location->id)->onQueue('mapbox_disable');

                    $location->status = 5;

                    $location->save();
                } elseif ($location->active == 1 && $location->verified == 1 && $location->status == 5) {

                    PushToMapbox::dispatch($location->id)->onQueue('mapbox_reactivate');

                    $location->status = 2;
                    $location->save();
                } elseif ($location->active == 1 && $location->verified == 1 && $location->status == 6) {
                    DeleteOnMapbox::dispatch($location->id)->onQueue('mapbox_delete');

                    $location->status = 7;
                    $location->save();
                }
            }

            $message = 'All locations have been processed successfully, please, be aware that there will be some time before modifications appears on the map ';
            return back()->with('message', $message);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importDataView()
    {
        return view('admin.import-data');
    }
}
