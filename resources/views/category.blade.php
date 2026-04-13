@extends('layouts.main')

@section('title', 'Liorenne — ' . $categoryName)

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/catalogue.css') }}" />
@endsection

@section('content')

<div class="catalogue-page">

    <h1 class="catalogue-title">{{ $categoryName }}</h1>
    <p class="catalogue-count">{{ $products->total() }} {{ Str::plural('item', $products->total()) }}</p>

    <form method="GET" action="{{ request()->url() }}">
        <div class="catalogue-layout">

            {{-- ── FILTER SIDEBAR ── --}}
            <aside class="filter-sidebar">
                <p class="filter-sidebar-title">Refine</p>

                {{-- Sort --}}
                <div class="filter-group">
                    <span class="filter-group-label">Sort by</span>
                    <div class="filter-radio-list">
                        <label class="filter-radio">
                            <input type="radio" name="sort" value="newest"
                                {{ request('sort', 'newest') === 'newest' ? 'checked' : '' }}>
                            Newest
                        </label>
                        <label class="filter-radio">
                            <input type="radio" name="sort" value="price_asc"
                                {{ request('sort') === 'price_asc' ? 'checked' : '' }}>
                            Price — Low to High
                        </label>
                        <label class="filter-radio">
                            <input type="radio" name="sort" value="price_desc"
                                {{ request('sort') === 'price_desc' ? 'checked' : '' }}>
                            Price — High to Low
                        </label>
                    </div>
                </div>

                {{-- Price range --}}
                <div class="filter-group">
                    <span class="filter-group-label">Price (€)</span>
                    <div class="filter-price-row">
                        <input type="number" name="price_min" class="filter-price-input"
                            placeholder="Min" value="{{ request('price_min') }}" min="0">
                        <span class="filter-price-sep">—</span>
                        <input type="number" name="price_max" class="filter-price-input"
                            placeholder="Max" value="{{ request('price_max') }}" min="0">
                    </div>
                </div>

                {{-- Brand --}}
                <div class="filter-group">
                    <span class="filter-group-label">Brand</span>
                    <select name="brand" class="filter-select">
                        <option value="">All brands</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand }}" {{ request('brand') === $brand ? 'selected' : '' }}>
                                {{ $brand }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Color --}}
                <div class="filter-group">
                    <span class="filter-group-label">Color</span>
                    <select name="color" class="filter-select">
                        <option value="">All colors</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color }}" {{ request('color') === $color ? 'selected' : '' }}>
                                {{ $color }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Actions --}}
                <div class="filter-actions">
                    <button type="submit" class="btn-filter-apply">Apply</button>
                    <a href="{{ request()->url() }}" class="btn-filter-clear">Clear all</a>
                </div>

            </aside>

            {{-- ── PRODUCT GRID ── --}}
            <div>
                <div class="product-grid">
                    @forelse ($products as $product)
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
                    @empty
                        <div class="catalogue-empty">
                            No products found for the selected filters.
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                @if ($products->hasPages())
                    <div class="catalogue-pagination">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>

        </div>
    </form>

</div>

@endsection
