<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Group;
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
            'group_id' => Group::first(),
            'value' => $this->faker->numberBetween(0, 100),
            'answer_id' => Answer::first()
        ];
    }
}
