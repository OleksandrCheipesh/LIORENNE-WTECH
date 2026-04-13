<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));

        $products = collect();

        if ($q !== '') {
            $products = Product::where(function ($query) use ($q) {
                $query->where('name',        'like', "%{$q}%")
                      ->orWhere('description','like', "%{$q}%")
                      ->orWhere('brand',      'like', "%{$q}%")
                      ->orWhere('color',      'like', "%{$q}%")
                      ->orWhere('category',   'like', "%{$q}%");
            })
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();
        }

        return view('search', compact('products', 'q'));
    }
}
