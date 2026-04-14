@extends('layouts.main')

@section('title', 'Checkout - Liorenne')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/checkout.css') }}" />
@endsection

@section('content')

@php
    $user = auth()->user();
    $fullName = trim($user->name ?? '');
    $nameParts = $fullName !== '' ? preg_split('/\s+/', $fullName) : [];
    $firstName = $nameParts[0] ?? '';
    $lastName = count($nameParts) > 1 ? implode(' ', array_slice($nameParts, 1)) : '';
@endphp

<div class="checkout-container">

    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ url('/cart') }}" class="checkout-back d-inline-flex align-items-center mb-4">
                ← Back to Cart
            </a>
            <h1 class="checkout-title text-center">Checkout</h1>
        </div>
    </div>

    @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mb-4">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-5">

        <!-- Form -->
        <div class="col-lg-8">
            <div class="checkout-form-box">
                <h2 class="form-section-title">Contact Information</h2>

                <form id="checkoutForm" action="{{ route('checkout.submit') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="checkout-label required" for="firstName">First Name</label>
                            <input
                                type="text"
                                name="first_name"
                                class="checkout-input form-control @error('first_name') is-invalid @enderror"
                                id="firstName"
                                value="{{ old('first_name', $firstName) }}"
                                placeholder="John"
                                required
                            >
                            @error('first_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="checkout-label required" for="lastName">Last Name</label>
                            <input
                                type="text"
                                name="last_name"
                                class="checkout-input form-control @error('last_name') is-invalid @enderror"
                                id="lastName"
                                value="{{ old('last_name', $lastName) }}"
                                placeholder="Smith"
                                required
                            >
                            @error('last_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="checkout-label required" for="email">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="checkout-input form-control @error('email') is-invalid @enderror"
                                id="email"
                                value="{{ old('email', $user->email ?? '') }}"
                                placeholder="john.smith@gmail.com"
                                required
                            >
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="checkout-label required" for="phone">Phone</label>
                            <input
                                type="tel"
                                name="phone"
                                class="checkout-input form-control @error('phone') is-invalid @enderror"
                                id="phone"
                                value="{{ old('phone') }}"
                                placeholder="+421 900 123 456"
                                required
                            >
                            @error('phone')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="checkout-label required" for="country">Country</label>
                            <input
                                type="text"
                                name="country"
                                class="checkout-input form-control @error('country') is-invalid @enderror"
                                id="country"
                                value="{{ old('country') }}"
                                placeholder="Slovakia"
                                required
                            >
                            @error('country')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="checkout-label required" for="street">Street</label>
                            <input
                                type="text"
                                name="street"
                                class="checkout-input form-control @error('street') is-invalid @enderror"
                                id="street"
                                value="{{ old('street') }}"
                                placeholder="Main Street"
                                required
                            >
                            @error('street')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="checkout-label required" for="streetNumber">House Number</label>
                            <input
                                type="text"
                                name="street_number"
                                class="checkout-input form-control @error('street_number') is-invalid @enderror"
                                id="streetNumber"
                                value="{{ old('street_number') }}"
                                placeholder="21"
                                required
                            >
                            @error('street_number')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="checkout-label required" for="zip">ZIP / Postal Code</label>
                            <input
                                type="text"
                                name="zip"
                                class="checkout-input form-control @error('zip') is-invalid @enderror"
                                id="zip"
                                value="{{ old('zip') }}"
                                placeholder="811 01"
                                required
                            >
                            @error('zip')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="payment-section mt-5">
                        <h2 class="form-section-title">Payment Method</h2>

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="payment-option {{ old('payment_method', 'cash') === 'cash' ? 'active' : '' }}" data-payment="cash">
                                    <input
                                        class="d-none"
                                        type="radio"
                                        name="payment_method"
                                        value="cash"
                                        id="cash"
                                        {{ old('payment_method', 'cash') === 'cash' ? 'checked' : '' }}
                                    >
                                    <label for="cash" class="payment-label">
                                        <span class="payment-icon">💵</span>
                                        <div>
                                            <strong>Cash on Delivery</strong>
                                            <small>Pay upon arrival</small>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="payment-option {{ old('payment_method') === 'card' ? 'active' : '' }}" data-payment="card">
                                    <input
                                        class="d-none"
                                        type="radio"
                                        name="payment_method"
                                        value="card"
                                        id="card"
                                        {{ old('payment_method') === 'card' ? 'checked' : '' }}
                                    >
                                    <label for="card" class="payment-label">
                                        <span class="payment-icon">💳</span>
                                        <div>
                                            <strong>Credit Card</strong>
                                            <small>Secure online payment</small>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        @error('payment_method')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="checkout-summary sticky-top" style="top: 2rem;">
                <h3 class="summary-title">Order Summary</h3>

                @if(!empty($cart))
                    @foreach($cart as $item)
                        <div class="summary-row d-flex justify-content-between align-items-start">
                            <div>
                                <span>{{ $item['name'] }}</span><br>
                                <small class="text-muted">Qty: {{ $item['quantity'] }}</small>
                            </div>
                            <strong>€{{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted mb-3">Your cart is empty.</p>
                @endif

                <hr class="my-3">

                <div class="summary-row d-flex justify-content-between align-items-center">
                    <span>Subtotal</span>
                    <strong>€{{ number_format($subtotal, 2) }}</strong>
                </div>

                <div class="summary-row d-flex justify-content-between align-items-center">
                    <span>Shipping</span>
                    <strong>€{{ number_format($shipping, 2) }}</strong>
                </div>

                <div class="summary-total d-flex justify-content-between align-items-center mt-3">
                    <h4>Total</h4>
                    <h2>€{{ number_format($total, 2) }}</h2>
                </div>

                <button type="submit" form="checkoutForm" class="btn-order w-100 d-flex align-items-center justify-content-center mt-4" {{ empty($cart) ? 'disabled' : '' }}>
                    Confirm Order
                </button>
            </div>
        </div>

    </div>
</div>
@endsection

@section('extra-js')
<script>
    document.querySelectorAll('.payment-option').forEach(option => {
        option.addEventListener('click', () => {
            document.querySelectorAll('.payment-option').forEach(o => o.classList.remove('active'));
            option.classList.add('active');

            const radio = option.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
            }
        });
    });
</script>
@endsection