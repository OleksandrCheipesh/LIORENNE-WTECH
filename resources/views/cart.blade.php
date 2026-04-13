@extends('layouts.main')

@section('title', 'Cart - Liorenne')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/cart.css') }}" />
@endsection

@section('content')

<!-- ═══════════════════════════════════════
     CART
════════════════════════════════════════ -->
<div class="cart-container">
    <h1 class="text-center mb-5 fw-bold">Your Cart</h1>

    <div class="row g-5">

        <!-- ── Product list ── -->
        <div class="col-lg-8">

            <!-- Product 1 -->
            <div class="cart-product">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <img src="https://via.placeholder.com/120x160/f8f9fa/6c757d?text=1"
                             class="img-fluid" alt="Main Product">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h3 class="fw-bold mb-2">Main Product</h3>
                                <p class="text-muted mb-1">Item: AB123456</p>
                            </div>
                            <button class="btn btn-sm btn-outline-danger">Remove</button>
                        </div>
                        <div class="d-flex align-items-center">
                            <label class="form-label fw-semibold me-3 mb-0">Quantity:</label>
                            <input type="number" class="form-control quantity-input me-3" value="1" min="1">
                            <span class="fw-bold fs-5 text-dark">€99.99</span>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="gift1">
                            <label class="form-check-label" for="gift1">Gift wrapping</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="cart-product">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <img src="https://via.placeholder.com/120x160/f8f9fa/6c757d?text=2"
                             class="img-fluid" alt="Second Product">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h3 class="fw-bold mb-2">Second Product</h3>
                                <p class="text-muted mb-1">Item: CD789012</p>
                            </div>
                            <button class="btn btn-sm btn-outline-danger">Remove</button>
                        </div>
                        <div class="d-flex align-items-center">
                            <label class="form-label fw-semibold me-3 mb-0">Quantity:</label>
                            <input type="number" class="form-control quantity-input me-3" value="1" min="1">
                            <span class="fw-bold fs-5 text-dark">€25.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="cart-product">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <img src="https://via.placeholder.com/120x160/f8f9fa/6c757d?text=3"
                             class="img-fluid" alt="Accessories">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h3 class="fw-bold mb-2">Accessories</h3>
                                <p class="text-muted mb-1">Item: EF345678</p>
                            </div>
                            <button class="btn btn-sm btn-outline-danger">Remove</button>
                        </div>
                        <div class="d-flex align-items-center">
                            <label class="form-label fw-semibold me-3 mb-0">Quantity:</label>
                            <input type="number" class="form-control quantity-input me-3" value="2" min="1">
                            <span class="fw-bold fs-5 text-dark">€12.50</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ── Order summary ── -->
        <div class="col-lg-4">
            <div class="summary-box">
                <h3 class="text-center mb-4 fw-bold fs-2">Order Summary</h3>

                <div class="mb-4">
                    <div class="summary-row d-flex justify-content-between align-items-center mb-3 p-3">
                        <span class="fs-6">Main Product (AB123456)</span>
                        <strong class="fs-6">€99.99</strong>
                    </div>
                    <div class="summary-row d-flex justify-content-between align-items-center mb-3 p-3">
                        <span class="fs-6">Second Product (CD789012)</span>
                        <strong class="fs-6">€25.00</strong>
                    </div>
                    <div class="summary-row d-flex justify-content-between align-items-center mb-3 p-3">
                        <span class="fs-6">Accessories (EF345678) x2</span>
                        <strong class="fs-6">€12.50</strong>
                    </div>
                </div>

                <div class="total-box text-center p-3 mb-4">
                    <h4 class="mb-2 fw-bold fs-5">Total</h4>
                    <h1 class="mb-0 fw-bold fs-2">€137.49</h1>
                </div>

                <a href="{{ url('/checkout') }}" class="btn-checkout w-100 py-3 fw-bold d-flex align-items-center justify-content-center text-decoration-none">
                    Continue to Checkout
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
