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

        Product::create([
            'name'           => $validated['name'],
            'description'    => $validated['description'],
            'price'          => $validated['price'],
            'original_price' => $validated['original_price'] ?: null,
            'category'       => $validated['category'],
            'brand'          => $validated['brand'],
            'color'          => $validated['colors'][0],
            'colors'         => $validated['colors'],
            'stock'          => $validated['stock'],
            'sizes'          => $validated['sizes'] ?? [],
            'image'          => $imagePaths[0] ?? null,
            'images'         => $imagePaths,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product-edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

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

        $imagePaths = $product->images ?? [];
        if ($request->hasFile('images')) {
            // Vymaž staré obrázky
            foreach ($imagePaths as $oldImage) {
                $fullPath = public_path($oldImage);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $file) {
                $filename     = uniqid('product_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/products'), $filename);
                $imagePaths[] = 'assets/products/' . $filename;
            }
        }

        $product->update([
            'name'           => $validated['name'],
            'description'    => $validated['description'],
            'price'          => $validated['price'],
            'original_price' => $validated['original_price'] ?: null,
            'category'       => $validated['category'],
            'brand'          => $validated['brand'],
            'color'          => $validated['colors'][0],
            'colors'         => $validated['colors'],
            'stock'          => $validated['stock'],
            'sizes'          => $validated['sizes'] ?? [],
            'image'          => $imagePaths[0] ?? $product->image,
            'images'         => $imagePaths,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Vymaž obrázky zo servera
        foreach ($product->images ?? [] as $image) {
            $fullPath = public_path($image);
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }

        $product->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Product deleted successfully.');
    }
}