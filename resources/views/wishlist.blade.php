@extends('layouts.main')

@section('title', 'Wishlist - Liorenne')

@section('content')

<!-- Header placeholder -->
<div id="site-header-placeholder"></div>

<!-- ═══════════════════════════════════════
     WISHLIST
════════════════════════════════════════ -->
<div class="wishlist-container">
  <h1 class="wishlist-title text-center">Your Wishlist</h1>

  <div class="row g-5">

    <!-- ── Wishlist items ── -->
    <div class="col-lg-8">

      <!-- Item 1 -->
      <div class="wishlist-item">
        <div class="row align-items-center">
          <div class="col-md-3">
            <img src="https://via.placeholder.com/120x160/f8f9fa/6c757d?text=1"
                 class="img-fluid wishlist-img" alt="Product 1">
          </div>
          <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <div>
                <h3 class="wishlist-item-name">Silk Evening Dress</h3>
                <p class="wishlist-item-ref">Item: SED001</p>
                <p class="wishlist-item-meta">Size: M &nbsp;·&nbsp; Colour: Ivory</p>
              </div>
              <button class="btn-remove" aria-label="Remove from wishlist">✕</button>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <span class="wishlist-item-price">€189.00</span>
              <button class="btn-add-cart">Add to Cart</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Item 2 -->
      <div class="wishlist-item">
        <div class="row align-items-center">
          <div class="col-md-3">
            <img src="https://via.placeholder.com/120x160/f8f9fa/6c757d?text=2"
                 class="img-fluid wishlist-img" alt="Product 2">
          </div>
          <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <div>
                <h3 class="wishlist-item-name">Cashmere Knit Sweater</h3>
                <p class="wishlist-item-ref">Item: CKS002</p>
                <p class="wishlist-item-meta">Size: S &nbsp;·&nbsp; Colour: Camel</p>
              </div>
              <button class="btn-remove" aria-label="Remove from wishlist">✕</button>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <span class="wishlist-item-price">€245.00</span>
              <button class="btn-add-cart">Add to Cart</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Item 3 -->
      <div class="wishlist-item">
        <div class="row align-items-center">
          <div class="col-md-3">
            <img src="https://via.placeholder.com/120x160/f8f9fa/6c757d?text=3"
                 class="img-fluid wishlist-img" alt="Product 3">
          </div>
          <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <div>
                <h3 class="wishlist-item-name">Leather Belt Bag</h3>
                <p class="wishlist-item-ref">Item: LBB003</p>
                <p class="wishlist-item-meta">Colour: Cognac</p>
              </div>
              <button class="btn-remove" aria-label="Remove from wishlist">✕</button>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <span class="wishlist-item-price">€320.00</span>
              <button class="btn-add-cart">Add to Cart</button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- ── Summary sidebar ── -->
    <div class="col-lg-4">
      <div class="wishlist-summary">

        <h3 class="summary-title">Summary</h3>

        <div class="summary-row d-flex justify-content-between align-items-center">
          <span>Items saved</span>
          <strong>3</strong>
        </div>

        <div class="summary-row d-flex justify-content-between align-items-center">
          <span>Total value</span>
          <strong>€754.00</strong>
        </div>

        <div class="summary-divider"></div>

        <button class="btn-add-all w-100 d-flex align-items-center justify-content-center">
          Add All to Cart
        </button>

        <a href="{{ url('/men') }}" class="btn-continue w-100 d-flex align-items-center justify-content-center">
          Continue Shopping
        </a>

      </div>
    </div>

  </div>
</div>

@endsection
