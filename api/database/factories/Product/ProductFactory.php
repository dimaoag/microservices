<?php

declare(strict_types=1);

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->numberBetween(10, 100)
        ];
    }
}
