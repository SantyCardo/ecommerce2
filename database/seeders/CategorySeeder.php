<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::query()->delete();

        $items = [
            'Consolas',
            'Controladores',
            'Accesorios',
            'Audio Gamer',
            'VR',
            'Retro',
            'PC Gamer',
            'Monitores',
            'Sillas Gamer',
            'Teclados',
            'Ratones',
            'Streaming',
            'Juegos Físicos',
            'Juegos Digitales',
            'Tarjetas Prepago'
        ];

        foreach ($items as $name) {
            Category::create(['name' => $name]);
        }
    }
}
