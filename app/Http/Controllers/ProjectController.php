<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function PHPUnit\Framework\isNull;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Project $project): View
    {


        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Project $project): View
    {

        return view('projects.edit', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {

        $project->delete();
        return redirect()
            ->route('projects.index')
            ->with('message', 'The project has been successfully deleted.');
    }
}
