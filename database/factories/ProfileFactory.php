<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->locale = 'fr_FR';

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'image' => null,
            // this have to be null if we want to shuffle base img profils and personnal img profils while using seeder (rand(1, 6)) considering we display profiles by last update
            'status' => $this->faker->randomElement(['inactif', 'en attente', 'actif']),
        ];
    }
}
