<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, string $category)
    {
        $categoryTitles = [
            'men'         => 'Men',
            'women'       => 'Women',
            'kids-baby'   => 'Kids & Baby',
            'home'        => 'Home',
            'accessories' => 'Accessories',
            'gifts'       => 'Gifts',
        ];

        if (!array_key_exists($category, $categoryTitles)) {
            abort(404);
        }

        $categoryName = $categoryTitles[$category];

        $query = Product::query()->where('category', $category);

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('color')) {
            $query->where('color', $request->color);
        }

        $sort = $request->get('sort', 'newest');

        match ($sort) {
            'price_asc'  => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            default      => $query->latest(),
        };

        $products = $query->paginate(12)->withQueryString();

        $brands = Product::where('category', $category)
            ->whereNotNull('brand')
            ->distinct()
            ->pluck('brand')
            ->filter()
            ->values();

        $colors = Product::where('category', $category)
            ->whereNotNull('color')
            ->distinct()
            ->pluck('color')
            ->filter()
            ->values();

        return view('category', compact('products', 'brands', 'colors', 'category', 'categoryName'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product-detail', compact('product'));
    }
}