<?php

namespace Database\Factories;

use App\Models\Admin\Soundscape;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Soundscape>
 */
class SoundscapeFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Soundscape::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numberBetween(601001, 602001),
            'title' => $this->faker->unique()->sentence(4),
            'created_by' => 801001,
            'isFree' => $this->faker->boolean(),
            'isValid' => $this->faker->boolean(),
        ];
    }
}
