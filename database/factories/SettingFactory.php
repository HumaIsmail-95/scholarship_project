<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'about_us' => $this->faker->paragraph(),
            'contact_us' => $this->faker->lastName(),
            'privacy_policy' => $this->faker->phoneNumber(),
            'mobile_1' => $this->faker->phoneNumber(),
            'mobile_2' => $this->faker->phoneNumber(),
            'address' =>  $this->faker->address(),
        ];
    }
}
