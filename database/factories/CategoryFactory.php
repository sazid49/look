<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => 1000,
            'value' => $this->faker->randomElement(['Cleaner','Baby Sitting','Gardener','House Maintenance','Elderly Care','Property Management','Car Repair']),
            'language' => $this->faker->randomElement(['en','fr','it']),
        ];
    }
}
