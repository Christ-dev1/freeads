<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
 public function definition(): array{

    $images = \Storage::disk('public')->files('ads_photos');

    return [
        'title'       => $this->faker->sentence(4),
        'description' => $this->faker->paragraph(3),
        'price'       => $this->faker->randomFloat(2, 10, 5000),
        'location'    => $this->faker->city(),
        'condition'   => $this->faker->randomElement(['Neuf', 'Occasion']),

        'photo'       => $this->faker->randomElement($images),
    ];
}


}
