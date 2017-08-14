<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompleteTaskTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_complete_a_task()
    {
        $this->disableExceptionHandling();

        $task = factory(Task::class)->states('incomplete')->create();

        $this->actingAs(factory(User::class)->create());

        $response = $this->get(route('task.completion.store', ['task' => $task]));

        $response->assertRedirect(route('task.index'));

        $this->assertTrue($task->fresh()->isComplete());
    }

    /** @test */
    public function a_user_can_uncomplete_a_task()
    {
        $this->disableExceptionHandling();

        $task = factory(Task::class)->states('complete')->create();

        $this->actingAs(factory(User::class)->create());

        $response = $this->get(route('task.uncompletion.store', ['task' => $task]));

        $response->assertRedirect(route('task.index'));

        $this->assertTrue($task->fresh()->isIncomplete());
    }
}
