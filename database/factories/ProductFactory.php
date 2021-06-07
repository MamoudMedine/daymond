<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->name,
            'cover_url' => $this->faker->imageUrl(),
            'images' => json_encode([$this->faker->imageUrl(),$this->faker->imageUrl(),$this->faker->imageUrl(),]),
            'condition' => $this->faker->word,
            'description' => $this->faker->text,
            'is_soldout' => $this->faker->boolean,
            'is_unavailable' => $this->faker->boolean,
            'wholesale_price' => $this->faker->randomNumber(4),
            'old_wholesale_price' => $this->faker->randomNumber(5),
            'commission' => $this->faker->randomNumber(4),
            'min_suggestion_price' => $this->faker->randomNumber(5),
            'max_suggestion_price' => $this->faker->randomNumber(5),
            'delivery_price' => $this->faker->randomNumber(4),
            'abj_delivery_price' => $this->faker->randomNumber(3),
            'location' => $this->faker->city
        ];
    }
}
