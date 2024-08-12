<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name' => $name,
            'descript' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'slug' => Str::slug($name),
            'img' => $this->faker->imageUrl(640, 480),
            'user_id' => User::pluck('id')->random(),
            'category_id' => Category::pluck('id')->random(),
        ];
    }
}
