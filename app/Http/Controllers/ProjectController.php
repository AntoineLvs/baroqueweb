<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //  ddd(auth()->user()->tenant_id);

        // if(session()->has('tenant_id')) {
        //
        //   $tenant_id = auth()->user()->tenant_id;
        //   $projects = Product::where('tenant_id', $tenant_id)->paginate(25);
        //   return view('projects.index', compact('projects'));
        // }
        //
        // else {

        $projects = Project::latest()->paginate(25);

        return view('projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $project_types = ProjectType::all();

        return view('projects.create', compact('project_types'));
    }

    // public function add()
    // {
    //   $project_types = ProjectType::all();
    //
    //   return view('projects.add', compact('project_types'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request, Project $model): RedirectResponse
    {
        //ddd($request->all());
        //$request(all());

        $model->create($request->all());

        return redirect()
            ->route('projects.index')
            ->with('message', 'Project was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Project $project): View
    {
        // $solds = $project->solds()->latest()->limit(25)->get();
        //
        // $receiveds = $project->receiveds()->latest()->limit(25)->get();
        //
        // $pricerequestedprojects = $project->pricerequests()->latest()->limit(25)->get();
        //
        // $purchases = $project->purchases()->latest()->limit(25)->get();

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Project $project): View
    {
        $project_types = ProjectType::all();

        return view('projects.edit', compact('project', 'project_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->all());

        return redirect()
            ->route('projects.index')
            ->with('message', 'Project was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('message', 'Project was deleted successfully.');
    }
}
