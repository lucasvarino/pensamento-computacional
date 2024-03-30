<?php

namespace Database\Factories;

use App\Models\Method;
use App\Models\TestClass;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TestClass>
 */
class TestClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Turma ' . $this->faker->numberBetween(1, 9) . '° Ano ' . ucfirst($this->faker->randomLetter()),
            'expire_date' => $this->faker->dateTime(),
            'institution' => $this->faker->name(),
            'url' => $this->faker->url(),
            'user_id' => User::first(),
            'method_id' => Method::first()
        ];
    }
}
