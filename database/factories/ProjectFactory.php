<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = fake()->text(20);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'content' => fake()->paragraphs(1, true),
            'image' => fake()->imageUrl(250, 250, true),
        ];
    }
}
