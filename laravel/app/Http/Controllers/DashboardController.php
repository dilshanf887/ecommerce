<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\DiscountService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(DiscountService $discountService)
    {
        $products = Product::with('category')->paginate(10);

        $products->getCollection()->transform(function ($product) use ($discountService) {
            $product->discounted_price = $discountService->getDiscountedPrice($product);
            return $product;
        });

        return view('dashboard', compact('products'));
    }
}
