<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Officer;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OfficerTest extends TestCase
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
        Officer::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('officers.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('officers.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $officer = Officer::factory()->create();
        $response = $this->get(route('officers.edit', [$officer]));
        $response->assertOk();
    }

    public function testStore()
    {
        $factoryData = Officer::factory()->make()->toArray();
        $data = \Arr::only($factoryData, [
            'military_rank',
            'name',
            'surname',
            'patronymic',
            'military_position',
            'information_security'
        ]);
        $response = $this->post(route('officers.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('officers', $data);
    }

    public function testUpdate()
    {
        $officer = Officer::factory()->create();
        $factoryData = Officer::factory()->make()->toArray();
        $data = \Arr::only($factoryData, [
            'military_rank',
            'name',
            'surname',
            'patronymic',
            'military_position',
            'information_security'
        ]);
        $response = $this->patch(route('officers.update', $officer), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('officers', $data);
    }

    public function testDestroy()
    {
        $officer = Officer::factory()->create();
        $response = $this->delete(route('officers.destroy', [$officer]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('officers', ['id' => $officer->id]);
    }
}
