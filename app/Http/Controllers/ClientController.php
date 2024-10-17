<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Client;
use App\Models\ClientType;
use App\Models\Location;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function PHPUnit\Framework\isNull;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {


        $clients = Client::latest()->paginate(25);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $client_types = ClientType::all();

        return view('clients.create', compact('client_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request, Location $model): RedirectResponse
    {
        //ddd($request->all());
        //$request(all());

        $search1 = $request->address;
        $search2 = $request->zipcode;

        $geodata = $this->getGeoResponse($search1, $search2);


        $location = new Location;


        $location->name = $request->name;
        $location->description = $request->description;
        $location->address = $request->address;
        $location->city = $request->city;
        $location->zipcode = $request->zipcode;
        $location->country = $request->country;

        $location->lng = $request->lng;
        $location->lat = $request->lat;


        $location->opening_start = $request->opening_start;
        $location->opening_end = $request->opening_end;
        $location->opening_info = $request->opening_info;


        $location->location_type_id = $request->location_type_id;

        $selectedServices = $request->service_id;
        $cleanedArray = array_map(
            fn($val) => intval(trim($val)),
            explode(',', $selectedServices)
        );
        $location->service_id = isNull($selectedServices) ? '[]' : json_encode($cleanedArray);

        $selectedProducts = $request->product_id;
        $cleanedArray = array_map(
            fn($val) => intval(trim($val)),
            explode(',', $selectedProducts)
        );
        $location->product_id = isNull($selectedProducts) ? '[]' : json_encode($cleanedArray);


        $user = auth()->user();
        $tenant_id = $user->tenant_id ?? 0;
        $location->tenant_id = $tenant_id;

        //  $model->create($request->all());

        $location->save();

        return redirect()
            ->route('locations.index')
            ->with('message', 'Location was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Client $client): View
    {

        $client_types = ClientType::all();
        $projects = Project::where('client_id', $client->id)->get();

        return view('locations.edit', compact('client_types', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Client $client): View
    {

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Location  $product
     */
    public function update(LocationRequest $request, Location $location): RedirectResponse
    {
        $location->name = $request->name;
        $location->description = $request->description;
        $location->address = $request->address;
        $location->city = $request->city;
        $location->zipcode = $request->zipcode;
        $location->country = $request->country;

        $location->lng = $request->lng;
        $location->lat = $request->lat;


        $location->opening_start = $request->opening_start;
        $location->opening_end = $request->opening_end;
        $location->opening_info = $request->opening_info;


        $location->location_type_id = $request->location_type_id;

        $selectedServices = $request->service_id;
        $cleanedArray = array_map(
            fn($val) => intval(trim($val)),
            explode(',', $selectedServices)
        );
        $location->service_id = json_encode($cleanedArray);

        $selectedProducts = $request->product_id;
        $cleanedArray = array_map(
            fn($val) => intval(trim($val)),
            explode(',', $selectedProducts)
        );
        $location->product_id = json_encode($cleanedArray);
        $location->verified = 0;
        $location->status = 1;
        $location->update();
        $location->save();

        return redirect()
            ->route('locations.edit', $location)
            ->with('message', '' . $location->name . ' informations have been successfully updated. Please wait for the changes to apply on the HVO Map.')
            ->with('locationId', $location->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client): RedirectResponse
    {
        $projects = Project::where('client_id', $client->id)->get();
        if ($projects) {

            foreach ($projects as $project) {
                $tasks = Task::where('project_id', $project->id)->get();
                if ($tasks) {
                    foreach ($tasks as $task) {
                        $task->delete();
                    }
                }
                $project->delete();
            }
        }

        $client->delete();
        return redirect()
            ->route('clients.index')
            ->with('message', 'The client, along with their projects and tasks, have been successfully deleted.');
    }
}
