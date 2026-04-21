@extends('layouts.main')

@section('title', $product->name . ' - Liorenne')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/product-detail.css') }}" />
<style>
    .product-options {
        margin-top: 24px;
    }

    .option-group {
        margin-bottom: 24px;
    }

    .option-values {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .size-option input,
    .color-option input {
        display: none;
    }

    .size-badge,
    .color-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 52px;
        padding: 10px 16px;
        border: 1px solid #d9d9d9;
        border-radius: 999px;
        background: #fff;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 14px;
    }

    .size-option input:checked + .size-badge,
    .color-option input:checked + .color-badge {
        background: #111;
        color: #fff;
        border-color: #111;
    }

    .color-badge {
        min-width: 90px;
    }

    .product-label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
    }
</style>
@endsection

@section('content')
<section class="product-hero">
    <div class="row g-5 align-items-start">

        <div class="col-lg-6">
            <div class="product-gallery">
                @php
                    $galleryImages = !empty($product->images) ? $product->images : ($product->image ? [$product->image] : []);
                    $fallback = asset('assets/polo.png');
                    $mainSrc = count($galleryImages) ? asset($galleryImages[0]) : $fallback;
                @endphp

                <img
                    src="{{ $mainSrc }}"
                    class="main-img"
                    alt="{{ $product->name }}"
                    id="mainImg"
                >

                <div class="thumbs">
                    @forelse ($galleryImages as $i => $img)
                        <img src="{{ asset($img) }}" class="thumb {{ $i === 0 ? 'active' : '' }}" alt="View {{ $i + 1 }}" onclick="switchImg(this)">
                    @empty
                        <img src="{{ $fallback }}" class="thumb active" alt="{{ $product->name }}" onclick="switchImg(this)">
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="product-info">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/' . $product->category) }}">
                                {{ ucfirst($product->category) }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{ $product->name }}</li>
                    </ol>
                </nav>

                <h1 class="product-name">{{ $product->name }}</h1>

                <div class="product-price-row">
                    <span class="product-price">€{{ number_format($product->price, 2) }}</span>

                    @if($product->original_price)
                        <span class="product-price-original">€{{ number_format($product->original_price, 2) }}</span>
                    @endif
                </div>

                <div class="product-options">

                    @php $colorList = !empty($product->colors) ? $product->colors : ($product->color ? [$product->color] : []); @endphp
                    @if(count($colorList))
                        <div class="option-group">
                            <label class="product-label">Colour</label>
                            <div class="option-values">
                                @foreach($colorList as $i => $c)
                                <label class="color-option">
                                    <input type="radio" name="selected_color_preview" value="{{ $c }}" {{ $i === 0 ? 'checked' : '' }}>
                                    <span class="color-badge">{{ $c }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if(!empty($product->sizes) && is_array($product->sizes))
                        <div class="option-group">
                            <label class="product-label">Size</label>
                            <div class="option-values">
                                @foreach($product->sizes as $size)
                                    <label class="size-option">
                                        <input
                                            type="radio"
                                            name="selected_size_preview"
                                            value="{{ $size }}"
                                            {{ $loop->first ? 'checked' : '' }}
                                        >
                                        <span class="size-badge">{{ $size }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                <div class="product-actions">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="addToCartForm">
                        @csrf

                        @if(count($colorList))
                            <input type="hidden" name="selected_color" id="cartColorInput" value="{{ $colorList[0] }}">
                        @endif

                        @if(!empty($product->sizes) && is_array($product->sizes))
                            <input
                                type="hidden"
                                name="selected_size"
                                id="selectedSizeInput"
                                value="{{ $product->sizes[0] }}"
                            >
                        @endif

                        <button type="submit" class="add-to-cart-btn">
                            <i class="bi bi-bag"></i> Add to Bag
                        </button>
                    </form>

                    <div class="secondary-actions">
                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                            @csrf

                            @if(count($colorList))
                                <input type="hidden" name="selected_color" id="wishlistColorInput" value="{{ $colorList[0] }}">
                            @endif

                            @if(!empty($product->sizes) && is_array($product->sizes))
                                <input
                                    type="hidden"
                                    name="selected_size"
                                    id="selectedWishlistSizeInput"
                                    value="{{ $product->sizes[0] }}"
                                >
                            @endif

                            <button type="submit" class="btn-wishlist">
                                <i class="bi bi-heart"></i> Wishlist
                            </button>
                        </form>
                        <button class="btn-share" type="button" aria-label="Share">
                            <i class="bi bi-share"></i>
                        </button>
                    </div>
                </div>

                <div class="stock-info">
                    <span class="stock-dot"></span>
                    <span>In stock</span>
                    <small>· Delivered in 2–3 days</small>
                </div>

                @if($product->description)
                    <div class="mt-4">
                        <h5>Description</h5>
                        <p>{{ $product->description }}</p>
                    </div>
                @endif

            </div>
        </div>

    </div>
</section>
@endsection

@section('extra-js')
<script>
    function switchImg(thumb) {
        document.getElementById('mainImg').src = thumb.src;
        document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
        thumb.classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const sizeRadios = document.querySelectorAll('input[name="selected_size_preview"]');
        const selectedSizeInput = document.getElementById('selectedSizeInput');

        if (sizeRadios.length && selectedSizeInput) {
            sizeRadios.forEach(radio => {
                radio.addEventListener('change', function () {
                    selectedSizeInput.value = this.value;
                });
            });
        }

        const colorRadios = document.querySelectorAll('input[name="selected_color_preview"]');
        const cartColorInput     = document.getElementById('cartColorInput');
        const wishlistColorInput = document.getElementById('wishlistColorInput');

        colorRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (cartColorInput)     cartColorInput.value     = this.value;
                if (wishlistColorInput) wishlistColorInput.value = this.value;
            });
        });
    });
</script>
@endsection