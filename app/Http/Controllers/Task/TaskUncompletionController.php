<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskUncompletionController extends Controller
{
    /**
     * Complete the given task
     **/
    public function store(Task $task)
    {
        $task->uncomplete();

        return redirect()
            ->route('task.index')
            ->with('success', 'Task complete');
    }
}

