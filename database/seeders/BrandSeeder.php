<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::query()->delete();

        $items = [
            'Sony PlayStation',
            'Microsoft Xbox',
            'Nintendo',
            'SEGA',
            'Valve',
            'Razer',
            'Logitech G',
            'HyperX',
            'SteelSeries',
            'Corsair',
            'ASUS ROG',
            'MSI',
            'Alienware',
            'Acer Predator',
            'HP OMEN',
            'Turtle Beach',
            'Elgato',
            'PowerA',
            'PDP Gaming',
            '8BitDo'
        ];

        foreach ($items as $name) {
            Brand::create(['name' => $name]);
        }
    }
}
