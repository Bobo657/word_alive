<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prefix' => $this->faker->title,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'plan' => $this->faker->randomElement(['basic', 'standard', 'premium']),
            'mail' => $this->faker->boolean,
            'sms' => $this->faker->boolean,
            'call' => $this->faker->boolean,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
