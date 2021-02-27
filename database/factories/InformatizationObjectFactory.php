<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\InformatizationObject;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformatizationObjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InformatizationObject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category' => $this->faker->numberBetween(1, 4),
            'department_id' => Department::factory(),
            'type' => $this->faker->word()
        ];
    }
}
