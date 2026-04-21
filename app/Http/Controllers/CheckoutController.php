<?php

namespace App\Http\Controllers;

use App\Mail\CheckoutOrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    private array $shippingRates = [
        'standard' => 4.00,
        'express'  => 9.00,
        'pickup'   => 0.00,
    ];

    public function index()
    {
        $cart = session()->get('cart', []);

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping = $subtotal > 0 ? 4.00 : 0.00;
        $total    = $subtotal + $shipping;

        return view('checkout', compact('cart', 'subtotal', 'shipping', 'total'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => ['required', 'string', 'max:100'],
            'last_name'       => ['required', 'string', 'max:100'],
            'email'           => ['required', 'email'],
            'phone'           => ['required', 'string', 'max:30'],
            'country'         => ['required', 'string', 'max:100'],
            'street'          => ['required', 'string', 'max:100'],
            'street_number'   => ['required', 'string', 'max:20'],
            'zip'             => ['required', 'string', 'max:20'],
            'shipping_method' => ['required', 'in:standard,express,pickup'],
            'payment_method'  => ['required', 'in:cash,card'],
        ]);

        $cart = session()->get('cart', []);

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping = $this->shippingRates[$validated['shipping_method']] ?? 4.00;
        $total    = $subtotal + $shipping;

        $orderData = [
            ...$validated,
            'cart' => $cart,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
        ];

        Mail::to('tvojmail@example.com')->send(new CheckoutOrderMail($orderData));

        session()->forget('cart');

        return redirect()->back()->with('success', 'Order was successfully submitted.');
    }
}