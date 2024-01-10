<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\BaseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ServiceController extends Controller
{

    public function index(): view
    {
        $services = Service::all(); // Get database services informations

        return view('services.index', compact('services'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BaseService $base_services): view
    {

        $base_services = BaseService::all();
        
        return view('services.create', compact('base_services'));
    }

    public function edit(Service $service): view
    {
        $services = Service::all(); // Get database services informations
        $base_services = BaseService::all();


        return view('services.edit', compact('service', 'base_services'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service): RedirectResponse
    {

        if ($service->document_id) {
            $this->destroyDocument($service);
        }

        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('message', 'Service was deleted successfully.');
    }

    public function show()
    {

        return view('services.show');
    }
}
