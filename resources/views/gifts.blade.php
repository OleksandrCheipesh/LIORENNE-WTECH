@extends('layouts.main')

@section('title', 'Liorenne - Gifts')

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
                <img src="https://via.placeholder.com/600x400/ffffff/1e3a8a?text=MODEL" class="img-fluid rounded-4 shadow-lg" alt="Men's Fashion">
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
                        <span class="badge bg-secondary px-3 py-2 rounded-pill cursor-pointer">XS</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill cursor-pointer">S</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill cursor-pointer">M</span>
                        <span class="badge bg-primary px-3 py-2 rounded-pill cursor-pointer fw-bold">L</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill cursor-pointer">XL</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill cursor-pointer">XXL</span>
                    </div>
                </div>

                <!-- Farba -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Color</h6>
                    <div class="d-flex gap-2 flex-wrap">
                        <label class="form-check-label d-flex align-items-center cursor-pointer">
                            <span class="badge-color" style="background: #000;"></span>
                            <span class="ms-2">Black</span>
                        </label>
                        <label class="form-check-label d-flex align-items-center cursor-pointer">
                            <span class="badge-color" style="background: #fff; border: 2px solid #ddd;"></span>
                            <span class="ms-2">White</span>
                        </label>
                        <label class="form-check-label d-flex align-items-center cursor-pointer">
                            <span class="badge-color" style="background: #8b4513;"></span>
                            <span class="ms-2">Brown</span>
                        </label>
                        <label class="form-check-label d-flex align-items-center cursor-pointer active">
                            <span class="badge-color" style="background: #1e3a8a;"></span>
                            <span class="ms-2 fw-bold">Blue</span>
                        </label>
                        <label class="form-check-label d-flex align-items-center cursor-pointer">
                            <span class="badge-color" style="background: #228b22;"></span>
                            <span class="ms-2">Grenn</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produkty -->
        <div class="col-lg-9">
            <div class="row g-4" id="products">
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('/product-detail') }}">
                        <div class="card product-card h-100">
                            <img src="{{ asset('assets/polo.png') }}" class="card-img-top product-img" alt="Polo Shirt">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold mb-2">Polo Shirt</h5>
                                <p class="text-muted mb-3">Classic fit, premium cotton</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h4 fw-bold text-dark mb-0">€89</span>
                                    <a href="{{ url('/cart') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-bold">
                                        <i class="bi bi-bag"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('/product-detail') }}">
                        <div class="card product-card h-100">
                            <img src="{{ asset('assets/polo.png') }}" class="card-img-top product-img" alt="Polo Shirt">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold mb-2">Polo Shirt</h5>
                                <p class="text-muted mb-3">Classic fit, premium cotton</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h4 fw-bold text-dark mb-0">€89</span>
                                    <a href="{{ url('/cart') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-bold">
                                        <i class="bi bi-bag"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('/product-detail') }}">
                        <div class="card product-card h-100">
                            <img src="{{ asset('assets/polo.png') }}" class="card-img-top product-img" alt="Polo Shirt">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold mb-2">Polo Shirt</h5>
                                <p class="text-muted mb-3">Classic fit, premium cotton</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h4 fw-bold text-dark mb-0">€89</span>
                                    <a href="{{ url('/cart') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-bold">
                                        <i class="bi bi-bag"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
