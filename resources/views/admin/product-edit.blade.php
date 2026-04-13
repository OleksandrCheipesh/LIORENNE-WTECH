@extends('layouts.admin')

@section('title', 'Edit Product — Liorenne Admin')

@section('content')

  <header class="page-header">
    <div>
      <h1 class="page-title">Edit Product</h1>
      <p class="page-sub">Polo Shirt — ID #001</p>
    </div>
    <a href="{{ url('/admin/dashboard') }}" class="btn-secondary">← Back</a>
  </header>

  <form class="product-form" action="{{ url('/admin/dashboard') }}" method="get">

    <div class="form-grid">

      <!-- Left col -->
      <div class="form-col">
        <div class="form-section">
          <h2 class="section-title">Basic Information</h2>

          <div class="field">
            <label for="name">Product Name <span class="req">*</span></label>
            <input type="text" id="name" value="Polo Shirt" required />
          </div>

          <div class="field">
            <label for="description">Description <span class="req">*</span></label>
            <textarea id="description" rows="5" required>A classic polo shirt crafted from premium piqué cotton. Slim fit, breathable fabric, ideal for smart-casual occasions.</textarea>
          </div>

          <div class="field-row">
            <div class="field">
              <label for="price">Price (€) <span class="req">*</span></label>
              <input type="number" id="price" value="150" min="0" step="0.01" required />
            </div>
            <div class="field">
              <label for="original-price">Original Price (€)</label>
              <input type="number" id="original-price" value="250" min="0" step="0.01" />
            </div>
          </div>

          <div class="field-row">
            <div class="field">
              <label for="category">Category <span class="req">*</span></label>
              <select id="category" required>
                <option value="">Select category</option>
                <option selected>Men</option>
                <option>Women</option>
                <option>Kids &amp; Baby</option>
                <option>Home</option>
                <option>Accessories</option>
                <option>Gifts</option>
              </select>
            </div>
            <div class="field">
              <label for="stock">Stock <span class="req">*</span></label>
              <input type="number" id="stock" value="32" min="0" required />
            </div>
          </div>

          <div class="field">
            <label>Sizes</label>
            <div class="checkbox-group">
              <label class="check-label"><input type="checkbox" value="XS" /> XS</label>
              <label class="check-label"><input type="checkbox" value="S" checked /> S</label>
              <label class="check-label"><input type="checkbox" value="M" checked /> M</label>
              <label class="check-label"><input type="checkbox" value="L" checked /> L</label>
              <label class="check-label"><input type="checkbox" value="XL" /> XL</label>
            </div>
          </div>

          <div class="field">
            <label for="colours">Colours</label>
            <input type="text" id="colours" value="Navy, Brown, Black, White" />
          </div>

        </div>
      </div>

      <!-- Right col -->
      <div class="form-col">
        <div class="form-section">
          <h2 class="section-title">Photos <span class="req">* min. 2</span></h2>

          <!-- Existing photos -->
          <div class="photo-preview" id="photoPreview">
            <div class="preview-item">
              <img src="https://via.placeholder.com/120x160/f0f0f0/999?text=Photo+1" alt="Photo 1" />
              <button type="button" class="preview-remove">✕</button>
            </div>
            <div class="preview-item">
              <img src="https://via.placeholder.com/120x160/f0f0f0/999?text=Photo+2" alt="Photo 2" />
              <button type="button" class="preview-remove">✕</button>
            </div>
          </div>

          <!-- Upload zone -->
          <div class="upload-zone" id="uploadZone" style="margin-top:16px;">
            <input type="file" id="photoInput" accept="image/*" multiple hidden />
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            <p class="upload-text">Add more photos</p>
            <button type="button" class="btn-upload">Browse files</button>
          </div>

        </div>
      </div>

    </div>

    <!-- Form footer -->
    <div class="form-footer">
      <button type="button" class="btn-danger">Delete Product</button>
      <div style="display:flex;gap:12px;">
        <a href="{{ url('/admin/dashboard') }}" class="btn-secondary">Cancel</a>
        <button type="submit" class="btn-primary">Save Changes</button>
      </div>
    </div>

  </form>

<div class="modal-overlay" id="deleteModal">
  <div class="modal">
    <h2 class="modal-title">Delete product?</h2>
    <p class="modal-text">Are you sure you want to delete <strong>Polo Shirt</strong>? This action cannot be undone.</p>
    <div class="modal-actions">
      <button class="btn-action">Cancel</button>
      <a href="{{ url('/admin/dashboard') }}" class="btn-action btn-delete">Delete</a>
    </div>
  </div>
</div>

@endsection
