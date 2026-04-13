<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, string $category)
    {
        $categoryMap = [
            'men'         => 'Men',
            'women'       => 'Women',
            'kids-baby'   => 'Kids & Baby',
            'home'        => 'Home',
            'accessories' => 'Accessories',
            'gifts'       => 'Gifts',
        ];

        $categoryName = $categoryMap[$category] ?? null;

        $query = Product::where('category', $categoryName);

        // Filter: price range
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        // Filter: brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Filter: color
        if ($request->filled('color')) {
            $query->where('color', $request->color);
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        match($sort) {
            'price_asc'  => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            default      => $query->latest(),
        };

        $products = $query->paginate(12)->withQueryString();

        // Get unique brands and colors for filter dropdowns
        $brands = Product::where('category', $categoryName)->distinct()->pluck('brand')->filter();
        $colors = Product::where('category', $categoryName)->distinct()->pluck('color')->filter();

        return view('category', compact('products', 'brands', 'colors', 'category', 'categoryName'));
    }
}
