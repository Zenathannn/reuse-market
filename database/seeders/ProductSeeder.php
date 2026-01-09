<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop Bekas Dell Core i5',
                'details' => 'Laptop bekas kondisi bagus, layar 14 inch, RAM 8GB, SSD 256GB. Cocok untuk pelajar dan pekerja kantoran.',
                'price' => 3500000,
                'image_01' => 'laptop1.jpg',
            ],
            [
                'name' => 'HP Samsung Galaxy S20',
                'details' => 'Smartphone bekas mulus, batere awet, semua fungsi normal. Include charger dan box.',
                'price' => 4200000,
                'image_01' => 'phone1.jpg',
            ],
            [
                'name' => 'Sepeda MTB 26 inch',
                'details' => 'Sepeda gunung bekas terawat, ban masih bagus, rem responsif. Siap pakai.',
                'price' => 1500000,
                'image_01' => 'bike1.jpg',
            ],
            [
                'name' => 'Kamera DSLR Canon 600D',
                'details' => 'Kamera DSLR bekas, lensa kit 18-55mm, kondisi normal semua, shutter count rendah.',
                'price' => 2800000,
                'image_01' => 'camera1.jpg',
            ],
            [
                'name' => 'Kulkas 2 Pintu Sharp',
                'details' => 'Kulkas bekas masih dingin, tidak ada bocor. Kapasitas 200 liter.',
                'price' => 1200000,
                'image_01' => 'fridge1.jpg',
            ],
            [
                'name' => 'Meja Belajar Kayu Jati',
                'details' => 'Meja belajar kayu jati solid, kondisi kokoh dan masih bagus.',
                'price' => 750000,
                'image_01' => 'desk1.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
