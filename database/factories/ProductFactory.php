<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
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
            'name' => $this->faker->unique()->text(10),
            'description' => $this->faker->realText(500),
            'price' => $this->faker->randomFloat(2, 2000000, 35000000),
            'img_url' => "https://picsum.photos/seed/{$this->faker->text(6)}/600",
            'screen' => $this->faker->randomElement(["TFT LCD", "IPS-LCD", "OLED", "AMOLED", "Super AMOLED"]),
            'resolution' => $this->faker->randomElement(["1440 x 2560", "1080 x 1920", "1440 x 2560", "1536 x 2048", "1200 x 1920", "1800 x 2560"]),
            'ram' => $this->faker->randomElement(["3gb", "4gb", "6gb", "8gb", "12gb"]),
            'cpu' => $this->faker->text(10),
            'gpu' => $this->faker->text(10),
            'storage' => $this->faker->randomElement(["16gb", "32gb", "64gb", "128gb", "256gb", "512gb"]),
            'discontinued' => $this->faker->randomElement([true, false]),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
        ];
    }
}
