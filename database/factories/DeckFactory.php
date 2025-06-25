<?php

namespace Database\Factories;

use App\Models\Admin\{Deck, Admin};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Deck>
 */
class DeckFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deck::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numberBetween(501006, 501010),
            'title' => $this->faker->unique()->sentence(4),
            'tag' => $this->faker->unique()->sentence(2),
            'isValid' => $this->faker->boolean(),
            'created_by' => Admin::findBy(8001002),
        ];
    }
}
