<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
       'user_id'=>User::factory(),
            'name'=> $this->faker->word(),
            'price'=> $this->faker->randomNumber(2),
            'status' => $this->faker->boolean(50)
        ];
    }
}
