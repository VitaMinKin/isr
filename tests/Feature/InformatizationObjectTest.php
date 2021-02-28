<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\InformatizationObject;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InformatizationObjectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        InformatizationObject::factory()->count(2)->make();
    }

    /** @test */
    public function testInformatizationObjectFactoryCanCreate()
    {
        $object = InformatizationObject::factory()->create();
        $this->assertInstanceOf(InformatizationObject::class, $object);
    }

    /** @test */
    public function testObjectShouldHaveDepartmentRelation()
    {
        $object = InformatizationObject::factory()->create();
        $this->assertNotEmpty($object->department_id);
        $this->assertInstanceOf(Department::class, $object->department);
    }

    /** @test */
    public function testWeCanProvideDepartmentIdToObjectFactory()
    {
        $department = Department::factory()->create();
        $object = InformatizationObject::factory()->create(['department_id' => $department->id]);
        $this->assertEquals($department->id, $object->department_id);
        $this->assertEquals(3, Department::count()); //2 - setup + 1 this
    }

    public function testIndex()
    {
        $response = $this->get(route('objects.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('objects.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $object = InformatizationObject::factory()->create();
        $response = $this->get(route('objects.edit', [$object]));
        $response->assertOk();
    }

    public function testStore()
    {
        $factoryData = InformatizationObject::factory()->make()->toArray();
        $data = \Arr::only($factoryData, [
            'name',
            'category',
            'department_id',
            'type'
        ]);
        $response = $this->post(route('objects.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('informatization_objects', $data);
    }

    public function testUpdate()
    {
        $object = InformatizationObject::factory()->create();
        $factoryData = InformatizationObject::factory()->make()->toArray();
        $data = \Arr::only($factoryData, [
            'name',
            'category',
            'department_id',
            'type'
        ]);
        $response = $this->patch(route('objects.update', $object), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('informatization_objects', $data);
    }

    public function testDestroy()
    {
        $object = InformatizationObject::factory()->create();
        $response = $this->delete(route('objects.destroy', [$object]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('informatization_objects', ['id' => $object->id]);
    }
}
