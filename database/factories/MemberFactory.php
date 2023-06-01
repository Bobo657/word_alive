<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Members>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'marital_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed']),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address,
            'dob' => $this->faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            'department_id' => rand(1, 17)
        ];
    }
}
