<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BaseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BaseServiceController extends Controller
{

  public function index(): View
  { 

    $base_services = BaseService::all(); // Get database informations
          
      return view('base-services.index', compact('base_services'));


  }

  public function edit(BaseService $base_service): View
  { 

    $base_services = BaseService::all(); // Get database informations
          
      return view('base-services.edit', compact('base_service'));


  }

  public function create(): View
  { 
          
      return view('base-services.create');


  }

    public function destroy(BaseService $base_service): RedirectResponse
    {

        if ($base_service->document_id) {
            $this->destroyDocument($base_service);
        }

        $base_service->delete();

        return redirect()
            ->route('base-services.index')
            ->with('message', 'BaseService was deleted successfully.');
    }


  
}
