<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add($id)
    {
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Polo Shirt',
                'price' => 89,
                'image' => 'assets/polo.png',
            ],
        ];

        if (!isset($products[$id])) {
            abort(404);
        }

        $product = $products[$id];
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produkt bol pridaný do košíka.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Produkt bol odstránený z košíka.');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->route('cart')->with('error', 'Produkt sa v košíku nenašiel.');
        }

        $quantity = (int) $request->quantity;

        if ($quantity < 1) {
            $quantity = 1;
        }

        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Množstvo produktu bolo upravené.');
    }
}