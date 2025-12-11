<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Bonsai Japonais',
                'description' => 'Petit arbre décoratif zen',
                'price' => '89.50',
                'stock' => '10',
                'image' => 'bonsai_1.jpg',
            ],
             [
                'name' => 'Bonsai Japonais',
                'description' => 'Petit arbre décoratif zen',
                'price' => '89.50',
                'stock' => '10',
                'image' => 'bonsai_2.jpg',
            ],
             [
                'name' => 'Bonsai Japonais',
                'description' => 'Petit arbre décoratif zen',
                'price' => '89.50',
                'stock' => '10',
                'image' => 'bonsai_3.jpg',
            ],
             [
                'name' => 'Bonsai Japonais',
                'description' => 'Petit arbre décoratif zen',
                'price' => '89.50',
                'stock' => '10',
                'image' => 'bonsai_4.jpg',
            ],
             [
                'name' => 'Bonsai Japonais',
                'description' => 'Petit arbre décoratif zen',
                'price' => '89.50',
                'stock' => '10',
                'image' => 'bonsai_5.jpg',
            ],
             [
                'name' => 'Bonsai Japonais',
                'description' => 'Petit arbre décoratif zen',
                'price' => '89.50',
                'stock' => '10',
                'image' => 'bonsai_6.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
