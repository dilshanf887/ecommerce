<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\DiscountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(DiscountService $discountService)
    {
        $products = Product::with('category')->paginate(10);
        foreach ($products as $product) {
            $product->discounted_price = $discountService->getDiscountedPrice($product, Auth::user());
        }

        return view('dashboard', compact('products'));
    }
}
