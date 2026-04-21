@extends('layouts.main')

@section('title', 'Cart - Liorenne')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/cart.css') }}" />
@endsection

@section('content')

<div class="cart-container">
    <h1 class="text-center mb-5 fw-bold">Your Cart</h1>

    @php $total = 0; @endphp

    <div class="row g-5">

        <div class="col-lg-8">
            @if(count($cart) > 0)
                @foreach($cart as $item)
                    @php $subtotal = $item['price'] * $item['quantity']; @endphp
                    @php $total += $subtotal; @endphp

                    <div class="cart-product">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="{{ asset($item['image']) }}"
                                     class="img-fluid"
                                     alt="{{ $item['name'] }}">
                            </div>

                            <div class="col-md-9">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h3 class="fw-bold mb-2">{{ $item['name'] }}</h3>
                                        <p class="text-muted mb-1">Item ID: {{ $item['id'] }}</p>
                                    </div>

                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Remove
                                        </button>
                                    </form>
                                </div>

                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-flex align-items-center flex-wrap gap-2">
                                        @csrf
                                        <label class="form-label fw-semibold mb-0">Quantity:</label>
                                        <input type="number"
                                            name="quantity"
                                            class="form-control quantity-input"
                                            value="{{ $item['quantity'] }}"
                                            min="1">
                                        <button type="submit" class="btn btn-sm btn-dark">
                                            Update
                                        </button>
                                    </form>

                                    <span class="fw-bold fs-5 text-dark">
                                        €{{ number_format($subtotal, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="cart-empty">
                    <p class="cart-empty__label">Your Bag</p>
                    <h2 class="cart-empty__title">Your cart is empty</h2>
                    <p class="cart-empty__sub">Add items to your bag to see them here.</p>
                    <a href="{{ route('women') }}" class="btn-checkout cart-empty__cta">Start Shopping</a>
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            <div class="summary-box">
                <h3 class="text-center mb-4 fw-bold fs-2">Order Summary</h3>

                <div class="mb-4">
                    @forelse($cart as $item)
                        <div class="summary-row d-flex justify-content-between align-items-center mb-3 p-3">
                            <span class="fs-6">{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                            <strong class="fs-6">€{{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                        </div>
                    @empty
                        <div class="summary-row d-flex justify-content-between align-items-center mb-3 p-3">
                            <span class="fs-6">No products</span>
                            <strong class="fs-6">€0.00</strong>
                        </div>
                    @endforelse
                </div>

                <div class="total-box text-center p-3 mb-4">
                    <h4 class="mb-2 fw-bold fs-5">Total</h4>
                    <h1 class="mb-0 fw-bold fs-2">€{{ number_format($total, 2) }}</h1>
                </div>

                <a href="{{ url('/checkout') }}"
                   class="btn-checkout w-100 py-3 fw-bold d-flex align-items-center justify-content-center text-decoration-none">
                    Continue to Checkout
                </a>
            </div>
        </div>

    </div>
</div>

@endsection