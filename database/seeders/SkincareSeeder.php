<?php

namespace Database\Seeders;

use App\Models\Skincare;
use App\Models\Category;
use Illuminate\Database\Seeder;

class SkincareSeeder extends Seeder
{
    public function run(): void
    {
        $cleanser = Category::create(['name' => 'Cleanser']);
        $toner = Category::create(['name' => 'Toner']);
        $serum = Category::create(['name' => 'Serum']);
        $sunscreen = Category::create(['name' => 'Sunscreen']);
        $moisturizer = Category::create(['name' => 'Moisturizer']);
        $treatment = Category::create(['name' => 'Treatment']);

        Skincare::create([
            'product' => 'Gentle Facial Cleanser',
            'brand' => 'Celeteque',
            'category_id' => $cleanser->id,
            'price' => 299,
        ]);

        Skincare::create([
            'product' => 'Hydrating Toner',
            'brand' => 'Belo',
            'category_id' => $toner->id,
            'price' => 350,
        ]);

        Skincare::create([
            'product' => 'Niacinamide 10% + Zinc 1%',
            'brand' => 'The Ordinary',
            'category_id' => $serum->id,
            'price' => 650,
        ]);

        Skincare::create([
            'product' => 'Sunscreen SPF 50',
            'brand' => 'Luxe Organix',
            'category_id' => $sunscreen->id,
            'price' => 420,
        ]);
    }
}