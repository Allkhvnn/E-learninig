<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'category' => fake()->randomElement(['Programming', 'Design', 'Marketing', 'Business']),
            'level' => fake()->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            'duration' => fake()->numberBetween(10, 120),
            'price' => fake()->randomFloat(2, 5000, 50000),
        ];
    }
}
