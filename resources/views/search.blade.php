@extends('layouts.main')

@section('title', $q ? 'Search: ' . $q . ' — Liorenne' : 'Search — Liorenne')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/catalogue.css') }}" />
@endsection

@section('content')

<div class="catalogue-page">

    {{-- Title --}}
    @if ($q)
        <h1 class="catalogue-title">Results for &ldquo;{{ $q }}&rdquo;</h1>
        <p class="catalogue-count">
            {{ $products->total() }} {{ Str::plural('item', $products->total()) }} found
        </p>
    @else
        <h1 class="catalogue-title">Search</h1>
        <p class="catalogue-count">Enter a search term above to find products.</p>
    @endif

    {{-- Results grid --}}
    @if ($q && $products->isNotEmpty())
        <div class="product-grid" style="margin-top: 40px;">
            @foreach ($products as $product)
                <div class="product-card">
                    <a href="{{ url('/product-detail') }}" class="product-card-inner">
                        <div class="product-card-img-wrap">
                            @if ($product->image)
                                <img src="{{ asset('assets/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="https://via.placeholder.com/400x533/f0f0f0/c0c0c0?text={{ urlencode($product->name) }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                        <div class="product-card-info">
                            <p class="product-card-brand">{{ $product->brand }}</p>
                            <p class="product-card-name">{{ $product->name }}</p>
                            <p class="product-card-brand" style="margin-bottom: 8px;">{{ $product->category }}</p>
                            <div class="product-card-prices">
                                <span class="product-card-price">€{{ number_format($product->price, 0) }}</span>
                                @if ($product->original_price)
                                    <span class="product-card-original">€{{ number_format($product->original_price, 0) }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/cart') }}" class="product-card-quick-add">Add to Cart</a>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if ($products->hasPages())
            <div class="catalogue-pagination">
                {{ $products->links() }}
            </div>
        @endif

    @elseif ($q)
        {{-- No results --}}
        <div style="text-align: center; padding: 80px 0;">
            <p style="font-family: var(--font-display); font-size: 1.4rem; font-style: italic; color: var(--color-text-muted); margin-bottom: 24px;">
                No products found for &ldquo;{{ $q }}&rdquo;
            </p>
            <p style="font-family: var(--font-body); font-size: 13px; font-weight: 300; color: var(--color-text-muted); margin-bottom: 40px;">
                Try a different search term or browse our categories below.
            </p>
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('men') }}" class="btn-primary" style="font-size: 12px; padding: 14px 32px;">Men</a>
                <a href="{{ route('women') }}" class="btn-primary" style="font-size: 12px; padding: 14px 32px;">Women</a>
                <a href="{{ route('accessories') }}" class="btn-primary" style="font-size: 12px; padding: 14px 32px;">Accessories</a>
            </div>
        </div>
    @endif

</div>

@endsection
