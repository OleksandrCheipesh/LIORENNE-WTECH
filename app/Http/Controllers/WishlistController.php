<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);

        $totalValue = collect($wishlist)->sum(function ($item) {
            return $item['price'];
        });

        return view('wishlist', compact('wishlist', 'totalValue'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $wishlist = session()->get('wishlist', []);

        if (!isset($wishlist[$id])) {
            $wishlist[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'description' => $product->description,
            ];

            session()->put('wishlist', $wishlist);
        }

        return redirect()->back()->with('success', 'Product added to wishlist.');
    }

    public function remove($id)
    {
        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
            session()->put('wishlist', $wishlist);
        }

        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}