<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Headquarter;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HeadquarterTest extends TestCase
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
        Headquarter::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('headquarters.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('headquarters.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $headquarter = Headquarter::factory()->create();
        $response = $this->get(route('headquarters.edit', [$headquarter]));
        $response->assertOk();
    }

    public function testStore()
    {
        $factoryData = Headquarter::factory()->make()->toArray();
        $data = \Arr::only($factoryData, [
            'name',
            'short_name'
        ]);
        $response = $this->post(route('headquarters.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('headquarters', $data);
    }

    public function testUpdate()
    {
        $headquarter = Headquarter::factory()->create();
        $factoryData = Headquarter::factory()->make()->toArray();
        $data = \Arr::only($factoryData, [
            'name',
            'short_name'
        ]);
        $response = $this->patch(route('headquarters.update', $headquarter), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('headquarters', $data);
    }

    public function testDestroy()
    {
        $headquarter = Headquarter::factory()->create();
        $response = $this->delete(route('headquarters.destroy', [$headquarter]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('headquarters', ['id' => $headquarter->id]);
    }
}
