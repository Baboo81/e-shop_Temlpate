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
                'name' => 'Pin Japonais',
                'description' => 'Petit arbre à aiguilles persistantes',
                'price' => '150',
                'stock' => '3',
                'image' => 'bonsai_1.jpg',
            ],
             [
                'name' => 'Chinois',
                'description' => 'Petit arbre décoratif zen',
                'price' => '245',
                'stock' => '6',
                'image' => 'bonsai_2.jpg',
            ],
             [
                'name' => 'Ficus',
                'description' => 'Bonsai facile à entretenir',
                'price' => '35',
                'stock' => '2',
                'image' => 'bonsai_3.jpg',
            ],
             [
                'name' => 'Jasmin Blanc',
                'description' => 'Bonsai nécessitant plus d\'expertise',
                'price' => '280',
                'stock' => '9',
                'image' => 'bonsai_4.jpg',
            ],
             [
                'name' => 'Selkova',
                'description' => 'Bonsai d\'extérieur',
                'price' => '89.50',
                'stock' => '10',
                'image' => 'bonsai_5.jpg',
            ],
             [
                'name' => 'Pin de Sibérie',
                'description' => 'Bonsai robuste',
                'price' => '155',
                'stock' => '10',
                'image' => 'bonsai_6.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
