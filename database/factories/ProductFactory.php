<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Froduct>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = ['anh1.webp','anh2.jpg','anh3.webp','anh4.jpg'];
        $key = fake()->randomElement(['0','1','2','3']);
        $price = fake()->randomFloat(2, 100, 1000);
        $sale = fake()->randomElement(['0','10', '15', '20', '25', '30', '35', '40', '45', '50']);
        return [
            'name' => fake()->jobTitle(),
            'price' => $price,
            'sale' => $sale,
            'image' => $images[$key],
            'description' => fake()->paragraph(),
            'category_id' => Category::inRandomOrder()->first()->id, //random lấy đầu tiên và khác nhau
        ];
    }
}
