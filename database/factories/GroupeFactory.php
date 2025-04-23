<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Groupe>
 */
class GroupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->unique()->name(),
            'description' => $this->faker->text(50),
            'owner_id' => \App\Models\Stagiaire::inRandomOrder()->value('id') ?? \App\Models\Stagiaire::factory()->create()->id,
        ];
    }
}
