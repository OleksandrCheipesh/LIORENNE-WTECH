@extends('layouts.main')

@section('title', 'Checkout - Liorenne')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/checkout.css') }}" />
@endsection

@section('content')

<!-- ═══════════════════════════════════════
     CHECKOUT
════════════════════════════════════════ -->
<div class="checkout-container">

    <!-- Back + title -->
    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ url('/cart') }}" class="checkout-back d-inline-flex align-items-center mb-4">
                ← Back to Cart
            </a>
            <h1 class="checkout-title text-center">Checkout</h1>
        </div>
    </div>

    <div class="row g-5">

        <!-- ── Form ── -->
        <div class="col-lg-8">
            <div class="checkout-form-box">

                <h2 class="form-section-title">Contact Information</h2>

                <form id="checkoutForm">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="checkout-label required" for="firstName">First Name</label>
                            <input type="text" class="checkout-input form-control" id="firstName" placeholder="John" required>
                        </div>
                        <div class="col-md-6">
                            <label class="checkout-label required" for="lastName">Last Name</label>
                            <input type="text" class="checkout-input form-control" id="lastName" placeholder="Smith" required>
                        </div>
                        <div class="col-md-6">
                            <label class="checkout-label required" for="email">Email</label>
                            <input type="email" class="checkout-input form-control" id="email" placeholder="john.smith@gmail.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="checkout-label required" for="phone">Phone</label>
                            <input type="tel" class="checkout-input form-control" id="phone" placeholder="+1 234 567 890" required>
                        </div>
                        <div class="col-md-6">
                            <label class="checkout-label required" for="state">Country</label>
                            <input type="text" class="checkout-input form-control" id="state" placeholder="United States" required>
                        </div>
                        <div class="col-md-6">
                            <label class="checkout-label required" for="street">Street</label>
                            <input type="text" class="checkout-input form-control" id="street" placeholder="Main Street" required>
                        </div>
                        <div class="col-md-6">
                            <label class="checkout-label required" for="streetNumber">House Number</label>
                            <input type="text" class="checkout-input form-control" id="streetNumber" placeholder="21" required>
                        </div>
                        <div class="col-md-6">
                            <label class="checkout-label required" for="zip">ZIP / Postal Code</label>
                            <input type="text" class="checkout-input form-control" id="zip" placeholder="10001" required>
                        </div>
                    </div>
                </form>

                <!-- Payment methods -->
                <div class="payment-section">
                    <h2 class="form-section-title">Payment Method</h2>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="payment-option active" data-payment="cash">
                                <input class="d-none" type="radio" name="payment" value="cash" checked id="cash">
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
                            <div class="payment-option" data-payment="card">
                                <input class="d-none" type="radio" name="payment" value="card" id="card">
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
                </div>

            </div>
        </div>

        <!-- ── Order summary ── -->
        <div class="col-lg-4">
            <div class="checkout-summary">

                <h3 class="summary-title">Order Summary</h3>

                <div class="summary-row d-flex justify-content-between align-items-center">
                    <span>Products</span>
                    <strong>€137.49</strong>
                </div>

                <div class="summary-row d-flex justify-content-between align-items-center">
                    <span>Standard Shipping</span>
                    <strong>€4.00</strong>
                </div>

                <div class="summary-total d-flex justify-content-between align-items-center">
                    <h4>Total</h4>
                    <h2>€141.49</h2>
                </div>

                <button class="btn-order w-100 d-flex align-items-center justify-content-center">
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
            option.querySelector('input[type="radio"]').checked = true;
        });
    });
</script>
@endsection
