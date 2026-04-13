@extends('layouts.main')

@section('title', 'Polo Shirt - Liorenne')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/product-detail.css') }}" />
@endsection

@section('content')

<!-- ═══════════════════════════════════════
     PRODUCT DETAIL
════════════════════════════════════════ -->
<section class="product-hero">
    <div class="row g-5 align-items-start">

        <!-- ── Gallery ── -->
        <div class="col-lg-6">
            <div class="product-gallery">
                <img src="{{ asset('assets/polo.png') }}"
                     class="main-img" alt="Polo Shirt" id="mainImg">
                <div class="thumbs">
                    <img src="{{ asset('assets/polo.png') }}" class="thumb active" alt="View 1" onclick="switchImg(this)">
                    <img src="{{ asset('assets/polo.png') }}" class="thumb" alt="View 2" onclick="switchImg(this)">
                    <img src="{{ asset('assets/polo.png') }}" class="thumb" alt="View 3" onclick="switchImg(this)">
                    <img src="{{ asset('assets/polo.png') }}" class="thumb" alt="View 4" onclick="switchImg(this)">
                </div>
            </div>
        </div>

        <!-- ── Product info ── -->
        <div class="col-lg-6">
            <div class="product-info">

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/men') }}">Men</a></li>
                        <li class="breadcrumb-item active">Polo Shirt</li>
                    </ol>
                </nav>

                <!-- Name -->
                <h1 class="product-name">Polo Shirt</h1>

                <!-- Price -->
                <div class="product-price-row">
                    <span class="product-price">€150</span>
                    <span class="product-price-original">€250</span>
                    <span class="product-discount">21% OFF</span>
                </div>

                <!-- Colour -->
                <label class="product-label">Colour</label>
                <div class="color-options">
                    <div class="color-badge active" data-color="#2E3F5D" style="background:#2E3F5D;"></div>
                    <div class="color-badge" data-color="#8b4513" style="background:#8b4513;"></div>
                    <div class="color-badge" data-color="#000000" style="background:#000;"></div>
                    <div class="color-badge" data-color="#ffffff" style="background:#fff; border-color:#ccc;"></div>
                </div>

                <!-- Size -->
                <label class="product-label" style="margin-top: 24px;">Size</label>
                <div class="size-options">
                    <div class="size-badge">XS</div>
                    <div class="size-badge active">S</div>
                    <div class="size-badge">M</div>
                    <div class="size-badge">L</div>
                    <div class="size-badge">XL</div>
                </div>
                <p style="margin-top: 10px; margin-bottom: 0;">
                    <a href="#" class="size-guide-link">Size guide</a>
                </p>

                <!-- Actions -->
                <div class="product-actions">
                    <form action="{{ route('cart.add', 1) }}" method="POST">
                        @csrf
                        <button type="submit" class="add-to-cart-btn">
                            <i class="bi bi-bag"></i> Add to Bag
                        </button>
                    </form>
                    <div class="secondary-actions">
                        <a href="{{ url('/wishlist') }}" class="btn-wishlist">
                            <i class="bi bi-heart"></i> Wishlist
                        </a>
                        <button class="btn-share" aria-label="Share">
                            <i class="bi bi-share"></i>
                        </button>
                    </div>
                </div>

                <!-- Stock -->
                <div class="stock-info">
                    <span class="stock-dot"></span>
                    <span>In stock</span>
                    <small>· Delivered in 2–3 days</small>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection

@section('extra-js')
<script>
    // Thumbnail switcher
    function switchImg(thumb) {
        document.getElementById('mainImg').src = thumb.src;
        document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
        thumb.classList.add('active');
    }

    // Size selector
    document.querySelectorAll('.size-badge').forEach(badge => {
        badge.addEventListener('click', () => {
            document.querySelectorAll('.size-badge').forEach(b => b.classList.remove('active'));
            badge.classList.add('active');
        });
    });

    // Colour selector
    document.querySelectorAll('.color-badge').forEach(badge => {
        badge.addEventListener('click', () => {
            document.querySelectorAll('.color-badge').forEach(b => b.classList.remove('active'));
            badge.classList.add('active');
        });
    });
</script>
@endsection
