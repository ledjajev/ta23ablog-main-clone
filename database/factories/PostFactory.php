<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created = fake()->dateTimeThisDecade();
        $updated = fake()->dateTimeBetween($created);
        if(rand(0,9)){
            $updated = $created;
        }

        return [
            'title' => fake()->sentence,
            'body' => fake()->paragraphs(12, true),
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
