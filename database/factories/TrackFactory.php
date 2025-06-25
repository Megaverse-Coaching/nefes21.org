<?php

namespace Database\Factories;

use App\Models\Admin\{Track, Admin, Content};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Track>
 */
class TrackFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Track::class;




    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numberBetween(101000, 102000),
            'title' => $this->faker->unique()->sentence(4),
            'label' => $this->faker->unique()->sentence(2),
            'link' => $this->faker->unique()->url(),
            'admin_id' => Admin::factory(),
            'content_id' => Content::factory(),
            'isFree' => $this->faker->boolean(),
            'isValid' => $this->faker->boolean(),
        ];
    }
}
