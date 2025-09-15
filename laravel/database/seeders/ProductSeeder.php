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
            // Electronics
            ['title' => 'iPhone 17', 'description' => 'Latest Apple smartphone', 'price' => 1200, 'product_category_id' => 3],
            ['title' => 'Samsung Galaxy S24', 'description' => 'New Samsung flagship', 'price' => 1100, 'product_category_id' => 3],
            ['title' => 'MacBook Pro', 'description' => 'Apple laptop 16 inch', 'price' => 2500, 'product_category_id' => 3],
            ['title' => 'Dell XPS 13', 'description' => 'Portable Windows laptop', 'price' => 1400, 'product_category_id' => 3],
            ['title' => 'Sony WH-1000XM5', 'description' => 'Noise-cancelling headphones', 'price' => 350, 'product_category_id' => 3],

            // Clothing
            ['title' => 'Leather Jacket', 'description' => 'Stylish leather jacket', 'price' => 200, 'product_category_id' => 2],
            ['title' => 'Jeans', 'description' => 'Comfortable blue jeans', 'price' => 60, 'product_category_id' => 2],
            ['title' => 'T-Shirt', 'description' => 'Cotton t-shirt', 'price' => 25, 'product_category_id' => 2],
            ['title' => 'Sneakers', 'description' => 'Running shoes', 'price' => 120, 'product_category_id' => 2],
            ['title' => 'Winter Coat', 'description' => 'Warm coat for winter', 'price' => 180, 'product_category_id' => 2],

            // Books
            ['title' => 'Laravel for Beginners', 'description' => 'Learn Laravel from scratch', 'price' => 50, 'product_category_id' => 1],
            ['title' => 'Clean Code', 'description' => 'Code quality best practices', 'price' => 45, 'product_category_id' => 1],
            ['title' => 'Design Patterns', 'description' => 'Software architecture patterns', 'price' => 60, 'product_category_id' => 1],
            ['title' => 'JavaScript: The Good Parts', 'description' => 'JS best practices', 'price' => 40, 'product_category_id' => 1],
            ['title' => 'PHP Cookbook', 'description' => 'PHP solutions for common problems', 'price' => 55, 'product_category_id' => 1],

            // Furniture
            ['title' => 'Office Chair', 'description' => 'Ergonomic chair', 'price' => 300, 'product_category_id' => 4],
            ['title' => 'Dining Table', 'description' => 'Wooden dining table', 'price' => 600, 'product_category_id' => 4],
            ['title' => 'Sofa', 'description' => 'Comfortable 3-seater', 'price' => 800, 'product_category_id' => 4],
            ['title' => 'Bookshelf', 'description' => '5-tier bookshelf', 'price' => 150, 'product_category_id' => 4],
            ['title' => 'Bed Frame', 'description' => 'Queen size bed', 'price' => 700, 'product_category_id' => 4],
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
