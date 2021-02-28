<?php

namespace Tests\Feature;

use App\Models\ObjectDocument;
use App\Models\InformatizationObject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ObjectDocumentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        ObjectDocument::factory()->count(2)->make();
    }

    /** @test */
    public function testObjectDocumentFactoryCanCreate()
    {
        $objectDocument = ObjectDocument::factory()->create();
        $this->assertInstanceOf(ObjectDocument::class, $objectDocument);
    }

    /** @test */
    public function testObjectDocumentShouldHaveInformatizationObjectsRelation()
    {
        $objectDocument = ObjectDocument::factory()->create();
        $this->assertNotEmpty($objectDocument->informatization_object_id);
        $this->assertInstanceOf(InformatizationObject::class, $objectDocument->informatizationObject);
    }
}
