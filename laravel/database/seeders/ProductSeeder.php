<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $books = ProductCategory::create(['title' => 'Books']);
        $clothing = ProductCategory::create(['title' => 'Clothing']);
        $electronics = ProductCategory::create(['title' => 'Electronics']);
        $furniture = ProductCategory::create(['title' => 'Furniture']);

        $products = [
            // Electronics
            ['title' => 'iPhone 17', 'description' => 'Latest Apple smartphone', 'price' => 1200, 'product_category_id' => $electronics->id],
            ['title' => 'Samsung Galaxy S24', 'description' => 'New Samsung flagship', 'price' => 1100, 'product_category_id' => $electronics->id],
            ['title' => 'MacBook Pro', 'description' => 'Apple laptop 16 inch', 'price' => 2500, 'product_category_id' => $electronics->id],
            ['title' => 'Dell XPS 13', 'description' => 'Portable Windows laptop', 'price' => 1400, 'product_category_id' => $electronics->id],
            ['title' => 'Sony WH-1000XM5', 'description' => 'Noise-cancelling headphones', 'price' => 350, 'product_category_id' => $electronics->id],

            // Clothing
            ['title' => 'Leather Jacket', 'description' => 'Stylish leather jacket', 'price' => 200, 'product_category_id' => $clothing->id],
            ['title' => 'Jeans', 'description' => 'Comfortable blue jeans', 'price' => 60, 'product_category_id' => $clothing->id],
            ['title' => 'T-Shirt', 'description' => 'Cotton t-shirt', 'price' => 25, 'product_category_id' => $clothing->id],
            ['title' => 'Sneakers', 'description' => 'Running shoes', 'price' => 120, 'product_category_id' => $clothing->id],
            ['title' => 'Winter Coat', 'description' => 'Warm coat for winter', 'price' => 180, 'product_category_id' => $clothing->id],

            // Books
            ['title' => 'Laravel for Beginners', 'description' => 'Learn Laravel from scratch', 'price' => 50, 'product_category_id' => $books->id],
            ['title' => 'Clean Code', 'description' => 'Code quality best practices', 'price' => 45, 'product_category_id' => $books->id],
            ['title' => 'Design Patterns', 'description' => 'Software architecture patterns', 'price' => 60, 'product_category_id' => $books->id],
            ['title' => 'JavaScript: The Good Parts', 'description' => 'JS best practices', 'price' => 40, 'product_category_id' => $books->id],
            ['title' => 'PHP Cookbook', 'description' => 'PHP solutions for common problems', 'price' => 55, 'product_category_id' => $books->id],

            // Furniture
            ['title' => 'Office Chair', 'description' => 'Ergonomic chair', 'price' => 300, 'product_category_id' => $furniture->id],
            ['title' => 'Dining Table', 'description' => 'Wooden dining table', 'price' => 600, 'product_category_id' => $furniture->id],
            ['title' => 'Sofa', 'description' => 'Comfortable 3-seater', 'price' => 800, 'product_category_id' => $furniture->id],
            ['title' => 'Bookshelf', 'description' => '5-tier bookshelf', 'price' => 150, 'product_category_id' => $furniture->id],
            ['title' => 'Bed Frame', 'description' => 'Queen size bed', 'price' => 700, 'product_category_id' => $furniture->id],
        ];

        foreach ($products as $prodData) {
            Product::create($prodData);
        }

        // Add discounts
        $books->discounts()->create([
            'percentage' => 15,
        ]);

        $electronics->discounts()->create([
            'percentage' => 5,
        ]);

        $specialCustomer = User::where('is_special_customer', true)->first();
        $specialCustomer->discounts()->create([
            'percentage' => 10,
        ]);

        $product1 = Product::first();
        $product1->discounts()->create([
            'percentage' => 20,
        ]);
    }
}
