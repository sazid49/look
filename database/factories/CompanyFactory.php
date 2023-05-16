<?php

namespace Database\Factories;

use App\Domains\Auth\Models\User;
use App\Domains\Company\Models\Company;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uid' => $this->faker->randomDigit(),
            'publications' => null,
            'category_id' => Category::all()->random()->id,
            'company_name' => $this->faker->company(),
            'company_name_api' => $this->faker->url(),
            'logo' => $this->faker->imageUrl(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'address' => $this->faker->address(),
            'post_office_box' => null,
            'postcode' => rand(1000,9999),
            'city' => $this->faker->city(),
            'longitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude(),
            'canton' => $this->faker->randomElement,
            'phone_1' => $this->faker->phoneNumber(),
            'phone_2' => $this->faker->phoneNumber(),
            'phone_3' => $this->faker->phoneNumber(),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'purpose' => null,
            'notes' => $this->faker->sentence(10),
            'keywords' => $this->faker->randomElement,
            'foundingyear' => $this->faker->year(),
            'team_leader' => null,
            'agent' => null,
            'assigned_to' => null,
            'show_tabs' => rand(0,1),
            'show_frontpage' => rand(0,1),
            'opening_hours' => null,
            'slug' => $this->faker->slug(),
            'hits' => 1,
            'active' => 1,
            'claimed' => 1,
            'claimed_by' => 1,
            'published' => 1,
            'claimed_on' => null,
            'api_sync' => rand(0,1),
            'inserted_by' => rand(1,2),
            'updated_by' => rand(1,2),
        ];
    }
}
