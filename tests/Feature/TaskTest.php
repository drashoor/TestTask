<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test That User Can Browse Tasks
     */
    public function test_a_user_can_browse_tasks()
    {
        $task = factory(Task::class)->create();

        $this->get('tasks')
            ->assertSuccessful()
            ->assertSee($task->name);
    }

    /**
     * Test That User can create new task
     */
    public function test_that_user_can_create_new_task()
    {
        $task = factory(Task::class)->make();

        $this->post('tasks', $task->toArray())
            ->assertRedirect('tasks');

        $this->get('tasks')
            ->assertSuccessful()
            ->assertSee($task->name);
    }

    public function test_a_user_can_update_current_task()
    {
        $task = factory(Task::class)->create();

        $new_data = factory(Task::class)->make();

        $this->put("posts/{$task->id}", $new_data->toArray());

        $this->assertDatabaseHas('tasks', $new_data->toArray());

    }

}
