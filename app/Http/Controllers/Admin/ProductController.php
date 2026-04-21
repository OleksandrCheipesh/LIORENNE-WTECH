<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products   = Product::orderByDesc('created_at')->paginate(20);
        $totalCount = Product::count();
        $outOfStock = Product::where('stock', 0)->count();

        return view('admin.dashboard', compact('products', 'totalCount', 'outOfStock'));
    }

    public function create()
    {
        return view('admin.product-new');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'required|string',
            'price'          => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'category'       => 'required|string',
            'brand'          => 'required|string',
            'colors'         => 'required|array|min:1',
            'colors.*'       => 'string|in:Black,White,Brown,Navy,Ivory,Camel',
            'stock'          => 'required|integer|min:0',
            'sizes'          => 'nullable|array',
            'sizes.*'        => 'string|in:XS,S,M,L,XL',
            'images'         => 'nullable|array|max:5',
            'images.*'       => 'image|max:4096',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename     = uniqid('product_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/products'), $filename);
                $imagePaths[] = 'assets/products/' . $filename;
            }
        }

        $colors = $validated['colors'];

        Product::create([
            'name'           => $validated['name'],
            'description'    => $validated['description'],
            'price'          => $validated['price'],
            'original_price' => $validated['original_price'] ?: null,
            'category'       => $validated['category'],
            'brand'          => $validated['brand'],
            'color'          => $colors[0],
            'colors'         => $colors,
            'stock'          => $validated['stock'],
            'sizes'          => $validated['sizes'] ?? [],
            'image'          => $imagePaths[0] ?? null,
            'images'         => $imagePaths,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Product created successfully.');
    }
}