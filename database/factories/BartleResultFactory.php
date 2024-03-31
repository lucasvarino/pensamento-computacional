<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BartleResult>
 */
class BartleResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'achiever' => $this->faker->numberBetween(0, 100),
            'explorer' => $this->faker->numberBetween(0, 100),
            'killer' => $this->faker->numberBetween(0, 100),
            'socializer' => $this->faker->numberBetween(0, 100),
            'answer_id' => Answer::first()
        ];
    }
}
