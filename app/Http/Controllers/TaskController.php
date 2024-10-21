<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function PHPUnit\Framework\isNull;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $tasks = Task::latest()->paginate(25);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $projects = Project::all();

        return view('tasks.create', compact('projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Task $task): View
    {


        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Task $tasks): View
    {

        return view('tasks.edit', compact('tasks'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $tasks): RedirectResponse
    {

        $tasks->delete();
        return redirect()
            ->route('tasks.index')
            ->with('message', 'The tasks has been successfully deleted.');
    }
}
