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
            'plan' => $this->faker->randomElement(config('app.plans')),
            'mail' => $this->faker->boolean,
            'sms' => $this->faker->boolean,
            'call' => $this->faker->boolean,
            'phone' => $this->faker->phoneNumber,
            'dob' => $this->faker->date(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'marital_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed']),
            'wedding_anniversary' => $this->faker->date()
        ];
    }
}
