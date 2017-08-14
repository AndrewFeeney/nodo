<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskCompletionController extends Controller
{
    /**
     * Complete the given task
     **/
    public function store(Task $task)
    {
        $task->complete();

        return redirect()
            ->route('task.index')
            ->with('success', 'Task complete');
    }
}
