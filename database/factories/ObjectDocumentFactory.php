<?php

namespace Database\Factories;

use App\Models\InformatizationObject;
use App\Models\ObjectDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObjectDocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ObjectDocument::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'informatization_object_id' => InformatizationObject::factory(),
            'documents_list_id' => $this->faker->numberBetween(1, 9),
            'preliminary_accounting' => $this->faker->numerify('##/#/####'),
            'number' => $this->faker->randomNumber(4, true),
            'date' => $this->faker->date(),
            'file_name' => $this->faker->word(),
            'file_path' => $this->faker->word(),
            'comment' => $this->faker->text()
        ];
    }
}
