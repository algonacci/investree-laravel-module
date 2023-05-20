<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $categoryCount = Category::count();
        if ($categoryCount === 0) {
            throw new \Exception('No categories found. Please add categories to the database.');
        }

        return [
            'title' => $this->faker->title(),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(200, 200),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'category_id' => $this->faker->numberBetween(1, $categoryCount)
        ];
    }
}
