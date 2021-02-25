<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Department;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DepartmentTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        Department::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('departments.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('departments.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $department = Department::factory()->create();
        $response = $this->get(route('departments.edit', [$department]));
        $response->assertOk();
    }

    public function testStore()
    {
        $factoryData = Department::factory()->make()->toArray();
        $data = \Arr::only($factoryData, [
            'name',
            'short_name',
            'subordination'
        ]);
        $response = $this->post(route('departments.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('departments', $data);
    }

    public function testUpdate()
    {
        $department = Department::factory()->create();
        $factoryData = Department::factory()->make()->toArray();
        $data = \Arr::only($factoryData, [
            'name',
            'short_name',
            'subordination'
        ]);
        $response = $this->patch(route('departments.update', $department), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('departments', $data);
    }

    public function testDestroy()
    {
        $department = Department::factory()->create();
        $response = $this->delete(route('departments.destroy', [$department]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('departments', ['id' => $department->id]);
    }
}
