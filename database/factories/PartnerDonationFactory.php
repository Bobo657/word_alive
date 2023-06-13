<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PartnerDonations>
 */
class PartnerDonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'partner_id' => random_int(1, 20),
            'reference' => $this->faker->unique()->randomNumber(),
            'amount' => $this->faker->numberBetween(100, 10000),
            'channel' => $this->faker->randomElement(['Card', 'USD']),
            'staus' => $this->faker->randomElement(['failed', 'success']),
            'authorization' => json_encode([
                "authorization_code" => "AUTH_hhw5ije9fp",
                "bin" => "408408",
                "last4" => "4081",
                "exp_month" => "12",
                "exp_year" => "2030",
                "channel" => "card",
                "card_type" => "visa ",
                "bank" => "TEST BANK",
                "country_code" => "NG",
                "brand" => "visa",
                "reusable" => true,
                "signature" => "SIG_uK1oSteBTGy2aqWLT1yk",
                "account_name" => null,
                "receiver_bank_account_number" => null,
                "receiver_bank" => null
            ]),
        ];
    }
}
