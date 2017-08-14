<?php

namespace Tests\Feature\Task;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_create_a_task()
    {
        $this->disableExceptionHandling();

        $this->actingAs(factory(User::class)->create());

        $response = $this->get(route('task.create'));

        $response->assertStatus(200);

        $response = $this->post(route('task.store'), [
            'name' => 'Test Task',
            'description' => 'Description.',
            'due_date' => '2017-01-01',
        ]);

        $response->assertRedirect(route('task.index'));

        $response = $this->get(route('task.index'));

        $response->assertSee('Test Task');
        $response->assertSee(route('task.show', ['task' => '1']));

        $this->assertDatabaseHas('tasks', [
            'name' => 'Test Task',
            'description' => 'Description.',
            'due_date' => '2017-01-01',
        ]);
    }

    /** @test */
    public function a_user_can_create_a_task_with_minimum_fields()
    {
        $this->disableExceptionHandling();

        $this->actingAs(factory(User::class)->create());

        $response = $this->get(route('task.create'));

        $response->assertStatus(200);

        $response = $this->post(route('task.store'), [
            'name' => 'Test Task',
        ]);

        $response->assertRedirect(route('task.index'));

        $response = $this->get(route('task.index'));

        $response->assertSee('Test Task');
        $response->assertSee(route('task.show', ['task' => '1']));

        $this->assertDatabaseHas('tasks', [
            'name' => 'Test Task',
            'description' => null,
            'due_date' => null,
        ]);
    }
}
