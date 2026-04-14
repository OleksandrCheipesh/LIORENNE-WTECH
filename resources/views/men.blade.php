@extends('layouts.main')

@section('title', "Liorenne - Men's Fashion")

@section('extra-css')
<link rel="stylesheet" href="{{ asset('styles/css/page.css') }}" />
@endsection

@section('content')

<div id="site-header-placeholder"></div>

<!-- Novinky -->
<section class="hero-section text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-3 fw-bold mb-4">New Arrivals</h1>
                <p class="lead fs-4 mb-5">Discover the newest trends</p>
                <a href="#products" class="btn btn-light btn-lg px-5 py-3 fw-bold fs-5 rounded-pill shadow-lg">
                    Shop now
                </a>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400/ffffff/1e3a8a?text=MODEL"
                     class="img-fluid rounded-4 shadow-lg"
                     alt="Men's Fashion">
            </div>
        </div>
    </div>
</section>

<!-- Filtrovanie -->
<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-3">
            <div class="filter-section sticky-top" style="top: 2rem;">
                <h5 class="fw-bold mb-4 border-bottom pb-3">Filter</h5>

                <!-- Triedenie -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Sort by</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sort" id="priceLow">
                        <label class="form-check-label" for="priceLow">Price low-high</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sort" id="priceHigh">
                        <label class="form-check-label" for="priceHigh">Price high-low</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sort" id="newest" checked>
                        <label class="form-check-label" for="newest">Newest</label>
                    </div>
                </div>

                <!-- Velkost -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Size</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">XS</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">S</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">M</span>
                        <span class="badge bg-primary px-3 py-2 rounded-pill fw-bold">L</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">XL</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">XXL</span>
                    </div>
                </div>

                <!-- Farba -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Color</h6>
                    <div class="d-flex gap-2 flex-wrap">
                        <label class="form-check-label d-flex align-items-center">
                            <span class="badge-color" style="background: #000; width: 16px; height: 16px; display: inline-block; border-radius: 50%;"></span>
                            <span class="ms-2">Black</span>
                        </label>
                        <label class="form-check-label d-flex align-items-center">
                            <span class="badge-color" style="background: #fff; border: 2px solid #ddd; width: 16px; height: 16px; display: inline-block; border-radius: 50%;"></span>
                            <span class="ms-2">White</span>
                        </label>
                        <label class="form-check-label d-flex align-items-center">
                            <span class="badge-color" style="background: #8b4513; width: 16px; height: 16px; display: inline-block; border-radius: 50%;"></span>
                            <span class="ms-2">Brown</span>
                        </label>
                        <label class="form-check-label d-flex align-items-center">
                            <span class="badge-color" style="background: #1e3a8a; width: 16px; height: 16px; display: inline-block; border-radius: 50%;"></span>
                            <span class="ms-2 fw-bold">Blue</span>
                        </label>
                        <label class="form-check-label d-flex align-items-center">
                            <span class="badge-color" style="background: #228b22; width: 16px; height: 16px; display: inline-block; border-radius: 50%;"></span>
                            <span class="ms-2">Green</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produkty -->
        <div class="col-lg-9">
            <div class="row g-4" id="products">
                @forelse($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <a href="{{ url('/product-detail/' . $product->id) }}" class="text-decoration-none text-dark">
                                <img
                                    src="{{ !empty($product->image) ? asset($product->image) : asset('assets/polo.png') }}"
                                    class="card-img-top product-img"
                                    alt="{{ $product->name }}"
                                >

                                <div class="card-body p-4">
                                    <h5 class="card-title fw-bold mb-2">{{ $product->name }}</h5>
                                    <p class="text-muted mb-3">
                                        {{ $product->description ?? 'No description available.' }}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h4 fw-bold text-dark mb-0">
                                            €{{ number_format($product->price, 2) }}
                                        </span>
                                    </div>
                                </div>
                            </a>

                            <div class="card-footer bg-transparent border-0 px-4 pb-4">
                                <div class="d-flex gap-2">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-grow-1">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100 px-4 py-2 rounded-pill fw-bold">
                                            <i class="bi bi-bag"></i> Add to cart
                                        </button>
                                    </form>

                                    <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="btn btn-outline-dark px-3 py-2 rounded-pill fw-bold"
                                            aria-label="Add to wishlist"
                                            title="Add to wishlist"
                                        >
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            No products found in this category.
                        </div>
                    </div>
                @endforelse
            </div>

            @if(isset($products) && method_exists($products, 'links'))
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection