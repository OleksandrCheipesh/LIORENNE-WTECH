<?php

namespace App\Http\Controllers;

use App\Mail\CheckoutOrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:30'],
            'country' => ['required', 'string', 'max:100'],
            'street' => ['required', 'string', 'max:100'],
            'street_number' => ['required', 'string', 'max:20'],
            'zip' => ['required', 'string', 'max:20'],
            'payment_method' => ['required', 'in:cash,card'],
        ]);

        Mail::to('tvojmail@example.com')->send(new CheckoutOrderMail($validated));

        return redirect()->back()->with('success', 'Order was successfully submitted.');
    }
}