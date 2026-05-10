<?php
namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cart = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->product_id => [
                        'id'       => $item->product_id,
                        'name'     => $item->product->name,
                        'price'    => $item->product->price,
                        'image'    => $item->product->image,
                        'quantity' => $item->quantity,
                    ]];
                })->toArray();
        } else {
            $cart = session()->get('cart', []);
        }

        return view('cart', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        if (Auth::check()) {
            $item = CartItem::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->first();

            if ($item) {
                $item->increment('quantity');
            } else {
                CartItem::create([
                    'user_id'    => Auth::id(),
                    'product_id' => $id,
                    'quantity'   => 1,
                ]);
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'id'       => $product->id,
                    'name'     => $product->name,
                    'price'    => $product->price,
                    'image'    => $product->image,
                    'quantity' => 1,
                ];
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Produkt bol pridaný do košíka.');
    }

    public function remove($id)
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->delete();
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Produkt bol odstránený z košíka.');
    }

    public function update(Request $request, $id)
    {
        $quantity = max(1, (int) $request->quantity);

        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->update(['quantity' => $quantity]);
        } else {
            $cart = session()->get('cart', []);
            if (!isset($cart[$id])) {
                return redirect()->route('cart')->with('error', 'Produkt sa v košíku nenašiel.');
            }
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Množstvo produktu bolo upravené.');
    }
}