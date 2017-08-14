<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $dates = [
        'completed_at'
    ];

    /**
     * Mark the task as complete
     **/
    public function complete()
    {
        $this->update(['completed_at' => Carbon::now()]);
    }

    /**
     * Mark the task as incomplete
     **/
    public function uncomplete()
    {
        $this->update(['completed_at' => null]);
    }

    /**
     * Returns true if the task is marked complete
     *
     * @return bool
     **/
    public function isComplete()
    {
        return !is_null($this->completed_at);
    }

    /**
     * Returns true if the task is marked incomplete
     *
     * @return bool
     **/
    public function isIncomplete()
    {
        return !$this->isComplete();
    }
}
