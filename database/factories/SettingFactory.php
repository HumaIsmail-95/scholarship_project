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
            'copy_right' => 'all copy rights re reserved by company',
            'introduction' => 'this is mall introfuction baout the website',
            'privacy_policy' => $this->faker->phoneNumber(),
            'mobile_1' => $this->faker->phoneNumber(),
            'mobile_2' => $this->faker->email(),
            'address' =>  $this->faker->address(),
        ];
    }
}
