@extends('layouts.admin')

@section('title', 'Edit Product — Liorenne Admin')

@section('content')

  <header class="page-header">
    <div>
      <h1 class="page-title">Edit Product</h1>
      <p class="page-sub">{{ $product->name }} — ID #{{ $product->id }}</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn-secondary">← Back</a>
  </header>

  @if ($errors->any())
    <div style="background:#fee2e2;border:1px solid #f87171;padding:1rem;border-radius:6px;margin-bottom:1.5rem;">
      <ul style="margin:0;padding-left:1.2rem;color:#b91c1c;font-size:0.875rem;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="product-form" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-grid">

      <!-- Left col -->
      <div class="form-col">
        <div class="form-section">
          <h2 class="section-title">Basic Information</h2>

          <div class="field">
            <label for="name">Product Name <span class="req">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="e.g. Silk Evening Dress" required />
          </div>

          <div class="field">
            <label for="description">Description <span class="req">*</span></label>
            <textarea id="description" name="description" rows="5" placeholder="Describe the product — material, fit, care instructions..." required>{{ old('description', $product->description) }}</textarea>
          </div>

          <div class="field-row">
            <div class="field">
              <label for="price">Price (€) <span class="req">*</span></label>
              <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="0.00" min="0" step="0.01" required />
            </div>
            <div class="field">
              <label for="original_price">Original Price (€)</label>
              <input type="number" id="original_price" name="original_price" value="{{ old('original_price', $product->original_price) }}" placeholder="0.00" min="0" step="0.01" />
            </div>
          </div>

          <div class="field-row">
            <div class="field">
              <label for="category">Category <span class="req">*</span></label>
              <select id="category" name="category" required>
                <option value="">Select category</option>
                @foreach(['Men', 'Women', 'Kids & Baby', 'Home', 'Accessories', 'Gifts'] as $cat)
                  <option value="{{ $cat }}" {{ old('category', $product->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
              </select>
            </div>
            <div class="field">
              <label for="stock">Stock <span class="req">*</span></label>
              <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="0" min="0" required />
            </div>
          </div>

          <div class="field">
            <label for="brand">Brand <span class="req">*</span></label>
            <select id="brand" name="brand" required>
              <option value="">Select brand</option>
              @foreach(['Liorenne', 'Maison L', 'Atelier V', 'Studio N'] as $brand)
                <option value="{{ $brand }}" {{ old('brand', $product->brand) === $brand ? 'selected' : '' }}>{{ $brand }}</option>
              @endforeach
            </select>
          </div>

          <div class="field">
            <label>Colours <span class="req">*</span></label>
            <div class="checkbox-group">
              @foreach(['Black', 'White', 'Brown', 'Navy', 'Ivory', 'Camel'] as $color)
                <label class="check-label">
                  <input type="checkbox" name="colors[]" value="{{ $color }}"
                    {{ in_array($color, old('colors', $product->colors ?? [])) ? 'checked' : '' }} />
                  {{ $color }}
                </label>
              @endforeach
            </div>
          </div>

          <div class="field">
            <label>Sizes</label>
            <div class="checkbox-group">
              @foreach(['XS', 'S', 'M', 'L', 'XL'] as $size)
                <label class="check-label">
                  <input type="checkbox" name="sizes[]" value="{{ $size }}"
                    {{ in_array($size, old('sizes', $product->sizes ?? [])) ? 'checked' : '' }} />
                  {{ $size }}
                </label>
              @endforeach
            </div>
          </div>

        </div>
      </div>

      <!-- Right col -->
      <div class="form-col">
        <div class="form-section">
          <h2 class="section-title">Photos <span class="req">max 5</span></h2>

          <div class="upload-zone" id="uploadZone">
            <input type="file" id="photoInput" name="images[]" accept="image/*" multiple hidden />
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            <p class="upload-text">Drag &amp; drop photos here</p>
            <p class="upload-sub">or</p>
            <button type="button" class="btn-upload" onclick="document.getElementById('photoInput').click()">Browse files</button>
            <p class="upload-hint">JPG, PNG — up to 5 images, max 4 MB each</p>
          </div>

          <p id="photoCount" style="font-size:0.8rem;color:#6b7280;margin-top:0.5rem;"></p>
          <div class="photo-preview" id="photoPreview" style="display:flex;flex-wrap:wrap;gap:0.5rem;margin-top:0.75rem;"></div>

        </div>
      </div>

    </div>

    <!-- Form footer -->
    <div class="form-footer">
      <button type="button" class="btn-danger" onclick="document.getElementById('deleteModal').style.display='flex'">Delete Product</button>
      <div style="display:flex;gap:12px;">
        <a href="{{ route('admin.dashboard') }}" class="btn-secondary">Cancel</a>
        <button type="submit" class="btn-primary">Save Changes</button>
      </div>
    </div>

  </form>

  <!-- Delete Modal -->
  <div class="modal-overlay" id="deleteModal" style="display:none;">
    <div class="modal">
      <h2 class="modal-title">Delete product?</h2>
      <p class="modal-text">Are you sure you want to delete <strong>{{ $product->name }}</strong>? This action cannot be undone.</p>
      <div class="modal-actions">
        <button class="btn-action" onclick="document.getElementById('deleteModal').style.display='none'">Cancel</button>
        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-action btn-delete">Delete</button>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('extra-js')
<script>
  const input   = document.getElementById('photoInput');
  const preview = document.getElementById('photoPreview');
  const zone    = document.getElementById('uploadZone');
  const counter = document.getElementById('photoCount');
  const MAX     = 5;

  input.addEventListener('change', () => showPreviews(input.files));

  zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('drag-over'); });
  zone.addEventListener('dragleave', () => zone.classList.remove('drag-over'));
  zone.addEventListener('drop', e => {
    e.preventDefault();
    zone.classList.remove('drag-over');
    if (e.dataTransfer.files.length) {
      input.files = e.dataTransfer.files;
      showPreviews(input.files);
    }
  });

  function showPreviews(files) {
    preview.innerHTML = '';
    const count = Math.min(files.length, MAX);
    counter.textContent = count + ' / ' + MAX + ' photo' + (count !== 1 ? 's' : '') + ' selected';

    for (let i = 0; i < count; i++) {
      const url  = URL.createObjectURL(files[i]);
      const wrap = document.createElement('div');
      wrap.style.cssText = 'position:relative;width:80px;height:100px;';
      const img  = document.createElement('img');
      img.src    = url;
      img.style.cssText = 'width:80px;height:100px;object-fit:cover;border-radius:4px;border:1px solid #e5e7eb;';
      if (i === 0) {
        const badge = document.createElement('span');
        badge.textContent = 'Main';
        badge.style.cssText = 'position:absolute;bottom:4px;left:50%;transform:translateX(-50%);background:#111;color:#fff;font-size:0.65rem;padding:1px 5px;border-radius:3px;white-space:nowrap;';
        wrap.appendChild(badge);
      }
      wrap.appendChild(img);
      preview.appendChild(wrap);
    }

    if (files.length > MAX) {
      counter.textContent += ' (only first 5 will be saved)';
    }
  }
</script>
@endsection