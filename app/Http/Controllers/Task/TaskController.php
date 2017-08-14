<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Show a list of tasks
     **/
    public function index()
    {
        return view('task.index', ['tasks' => Task::all()]);
    }

    /**
     * Show an individual task
     **/
    public function show(Task $task)
    {

    }

    /**
     * Show the form to create a task
     **/
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store the form submission and create a new task
     **/
    public function store()
    {
        Task::create([
            'name' => request()->name,
            'description' => request()->description,
            'due_date' => request()->due_date,
            'created_by' => \Auth::id(),
        ]);

        return redirect()
            ->route('task.index')
            ->with(['success' => 'Task created']);
    }
}
