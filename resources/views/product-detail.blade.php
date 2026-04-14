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
                <img
                    src="{{ $product->image ? asset($product->image) : asset('assets/polo.png') }}"
                    class="main-img"
                    alt="{{ $product->name }}"
                    id="mainImg"
                >

                <div class="thumbs">
                    <img src="{{ $product->image ? asset($product->image) : asset('assets/polo.png') }}" class="thumb active" alt="View 1" onclick="switchImg(this)">
                    <img src="{{ $product->image ? asset($product->image) : asset('assets/polo.png') }}" class="thumb" alt="View 2" onclick="switchImg(this)">
                    <img src="{{ $product->image ? asset($product->image) : asset('assets/polo.png') }}" class="thumb" alt="View 3" onclick="switchImg(this)">
                    <img src="{{ $product->image ? asset($product->image) : asset('assets/polo.png') }}" class="thumb" alt="View 4" onclick="switchImg(this)">
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

                    @if($product->color)
                        <div class="option-group">
                            <label class="product-label">Colour</label>
                            <div class="option-values">
                                <label class="color-option">
                                    <input type="radio" name="selected_color_preview" checked>
                                    <span class="color-badge">{{ $product->color }}</span>
                                </label>
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

                        @if($product->color)
                            <input type="hidden" name="selected_color" value="{{ $product->color }}">
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

                            @if($product->color)
                                <input type="hidden" name="selected_color" value="{{ $product->color }}">
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
    });
</script>
@endsection