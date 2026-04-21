@extends('layouts.main')

@section('title', 'Wishlist - Liorenne')

@section('content')
<div class="wishlist-container">
    <h1 class="wishlist-title text-center">Your Wishlist</h1>

    <div class="row g-5">
        <div class="col-lg-8">
            @forelse($wishlist as $item)
                <div class="wishlist-item">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img src="{{ !empty($item['image']) ? asset($item['image']) : asset('assets/polo.png') }}"
                                 class="img-fluid wishlist-img"
                                 alt="{{ $item['name'] }}">
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h3 class="wishlist-item-name">{{ $item['name'] }}</h3>
                                    <p class="wishlist-item-ref">Item: {{ $item['id'] }}</p>
                                    <p class="wishlist-item-meta">{{ $item['description'] ?? 'No description available.' }}</p>
                                </div>

                                <form action="{{ route('wishlist.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-remove" aria-label="Remove from wishlist">✕</button>
                                </form>
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <span class="wishlist-item-price">€{{ number_format($item['price'], 2) }}</span>

                                <form action="{{ route('cart.add', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-add-cart">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="wishlist-empty">
                    <p class="wishlist-empty__label">Wishlist</p>
                    <h2 class="wishlist-empty__title">Nothing saved yet</h2>
                    <p class="wishlist-empty__sub">Browse our collections and save items you love.</p>
                    <a href="{{ route('women') }}" class="btn-continue wishlist-empty__cta">Explore Collections</a>
                </div>
            @endforelse
        </div>

        <div class="col-lg-4">
            <div class="wishlist-summary">
                <h3 class="summary-title">Summary</h3>

                <div class="summary-row d-flex justify-content-between align-items-center">
                    <span>Items saved</span>
                    <strong>{{ count($wishlist) }}</strong>
                </div>

                <div class="summary-row d-flex justify-content-between align-items-center">
                    <span>Total value</span>
                    <strong>€{{ number_format($totalValue, 2) }}</strong>
                </div>

                <div class="summary-divider"></div>

                <a href="{{ url('/men') }}" class="btn-continue w-100 d-flex align-items-center justify-content-center">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>
@endsection