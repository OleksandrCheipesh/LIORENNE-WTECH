@extends('layouts.main')

@section('title', 'Liorenne')

@section('content')

<section class="hero">
    <div class="hero-placeholder">
        <img src="{{ asset('assets/seasonal.png') }}" alt="Spring Collection" />
    </div>
    <div class="hero-content">
        <p class="hero-subtitle">The spring collection</p>
        <a href="{{ url('/men') }}" class="btn-primary">SHOP NEW ARRIVALS</a>
    </div>
</section>


<section class="category-section">
    <div class="category-image">
        <img src="{{ asset('assets/seasonal.2.png') }}" alt="Categories" />
    </div>
    <nav class="category-nav">
        <a href="{{ url('/men') }}" class="category-link">MEN</a>
        <a href="{{ url('/women') }}" class="category-link">WOMEN</a>
        <a href="{{ url('/kids-baby') }}" class="category-link">KIDS &amp; BABY</a>
        <a href="{{ url('/home-category') }}" class="category-link">HOME</a>
        <a href="{{ url('/accessories') }}" class="category-link">ACCESSORIES</a>
        <a href="{{ url('/gifts') }}" class="category-link">GIFTS</a>
    </nav>
</section>

@endsection
