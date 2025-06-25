<?php

namespace Database\Factories;

use App\Models\Admin\{Admin, Content};
use Illuminate\Database\Eloquent\Factories\Factory;
use JsonException;

/**
 * @extends Factory<Content>
 */
class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws JsonException
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numberBetween(101000, 102000),
            'version' => $this->faker->unique()->numberBetween(1000, 9000),
            'type' => json_encode($this->faker->randomElements([
                "Course", "Single", "Podcast", "Story", "Meditation", "Breath", "ASMR", "Music"
            ], 3), JSON_THROW_ON_ERROR),
            'title' => $this->faker->unique()->sentence(),
            'description' => $this->faker->text(300),
            'admin_id' => Admin::factory(),
            'isFree' => $this->faker->boolean(),
            'isNew' => $this->faker->boolean(),
            'isValid' => $this->faker->boolean(),
            'isMulti' => $this->faker->boolean(),
            'age' => $this->faker->randomElement(['General', '12-18', '19-26', '27-35', '36-45', '45+']),
            'gender' => $this->faker->randomElement(['General', 'Male', 'Female', 'Private']),
        ];
    }
}
