<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        $names = [
            'PlayStation 5',
            'Xbox Series X',
            'Xbox Series S',
            'Nintendo Switch OLED',
            'Nintendo Switch Lite',
            'DualSense Controller',
            'Xbox Wireless Controller',
            'Pro Controller',
            'Razer BlackShark V2',
            'Logitech G502',
            'SteelSeries Arctis Nova',
            'Corsair K95 Keyboard',
            'ASUS ROG Gaming Monitor',
            'MSI Gaming Laptop',
            'HP OMEN Headset',
            'Acer Predator Chair',
            'Elgato Stream Deck',
            'Turtle Beach Recon',
            '8BitDo SN30 Pro',
            'PowerA Enhanced Wired Controller'
        ];

        return [
            'name' => fake()->randomElement($names),
            'price' => fake()->randomFloat(2, 99, 1499),
            'description' => fake()->sentence(12),
            'category_id' => Category::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }
}
