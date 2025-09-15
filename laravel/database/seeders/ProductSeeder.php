<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $categories = [
            ['title' => 'Books'],
            ['title' => 'Clothing'],
            ['title' => 'Electronics'],
            ['title' => 'Furniture'],
        ];
        
        foreach ($categories as $catData) {
            ProductCategory::create($catData);
        }

        $products = [
            [
                'title' => 'iPhone 15',
                'description' => 'Latest Apple smartphone',
                'price' => 1200.00,
                'product_category_id' => 1, // Electronics
            ],
            [
                'title' => 'Leather Jacket',
                'description' => 'Stylish leather jacket',
                'price' => 200.00,
                'product_category_id' => 2, // Clothing
            ],
            [
                'title' => 'Laravel Book',
                'description' => 'Beginner-friendly Laravel guide',
                'price' => 50.00,
                'product_category_id' => 3, // Books
            ],
            [
                'title' => 'Office Chair',
                'description' => 'Ergonomic office chair',
                'price' => 300.00,
                'product_category_id' => 4, // Furniture
            ],
        ];

        foreach ($products as $prodData) {
            Product::create($prodData);
        }

        $discounts = [
            [
                'product_category_id' => 1,
                'start_date' => now()->subDays(5),
                'end_date' => now()->addDays(30),
                'discount' => 0.05,
            ],
            [
                'product_category_id' => 2,
                'start_date' => now()->subDays(5),
                'end_date' => now()->addDays(30),
                'discount' => 0.10, 
            ],
            [
                'product_category_id' => 3,
                'start_date' => now()->subDays(5),
                'end_date' => now()->addDays(30),
                'discount' => 0.15,
            ],
        ];

        foreach ($discounts as $discount) {
            ProductCategoryDiscount::create($discount);
        }
    }
}
