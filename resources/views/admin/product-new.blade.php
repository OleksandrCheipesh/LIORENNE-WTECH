@extends('layouts.admin')

@section('title', 'Add Product — Liorenne Admin')

@section('content')

  <header class="page-header">
    <div>
      <h1 class="page-title">Add Product</h1>
      <p class="page-sub">Fill in the details for the new product</p>
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
            <input type="text" id="name" placeholder="e.g. Silk Evening Dress" required />
          </div>

          <div class="field">
            <label for="description">Description <span class="req">*</span></label>
            <textarea id="description" rows="5" placeholder="Describe the product — material, fit, care instructions..." required></textarea>
          </div>

          <div class="field-row">
            <div class="field">
              <label for="price">Price (€) <span class="req">*</span></label>
              <input type="number" id="price" placeholder="0.00" min="0" step="0.01" required />
            </div>
            <div class="field">
              <label for="original-price">Original Price (€)</label>
              <input type="number" id="original-price" placeholder="0.00" min="0" step="0.01" />
            </div>
          </div>

          <div class="field-row">
            <div class="field">
              <label for="category">Category <span class="req">*</span></label>
              <select id="category" required>
                <option value="">Select category</option>
                <option>Men</option>
                <option>Women</option>
                <option>Kids &amp; Baby</option>
                <option>Home</option>
                <option>Accessories</option>
                <option>Gifts</option>
              </select>
            </div>
            <div class="field">
              <label for="stock">Stock <span class="req">*</span></label>
              <input type="number" id="stock" placeholder="0" min="0" required />
            </div>
          </div>

          <div class="field">
            <label>Sizes</label>
            <div class="checkbox-group">
              <label class="check-label"><input type="checkbox" value="XS" /> XS</label>
              <label class="check-label"><input type="checkbox" value="S" /> S</label>
              <label class="check-label"><input type="checkbox" value="M" checked /> M</label>
              <label class="check-label"><input type="checkbox" value="L" /> L</label>
              <label class="check-label"><input type="checkbox" value="XL" /> XL</label>
            </div>
          </div>

          <div class="field">
            <label for="colours">Colours</label>
            <input type="text" id="colours" placeholder="e.g. Ivory, Black, Camel" />
          </div>

        </div>
      </div>

      <!-- Right col -->
      <div class="form-col">
        <div class="form-section">
          <h2 class="section-title">Photos <span class="req">* min. 2</span></h2>

          <!-- Upload zone -->
          <div class="upload-zone" id="uploadZone">
            <input type="file" id="photoInput" accept="image/*" multiple hidden />
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            <p class="upload-text">Drag &amp; drop photos here</p>
            <p class="upload-sub">or</p>
            <button type="button" class="btn-upload">Browse files</button>
            <p class="upload-hint">JPG, PNG — at least 2 photos required</p>
          </div>

          <!-- Preview grid -->
          <div class="photo-preview" id="photoPreview"></div>

        </div>
      </div>

    </div>

    <!-- Form footer -->
    <div class="form-footer">
      <a href="{{ url('/admin/dashboard') }}" class="btn-secondary">Cancel</a>
      <button type="submit" class="btn-primary">Save Product</button>
    </div>

  </form>

@endsection
