@extends('layouts.admin')

@section('title', 'Dashboard — Liorenne Admin')

@section('content')

  <header class="page-header">
    <div>
      <h1 class="page-title">Products</h1>
      <p class="page-sub">Manage your product catalogue</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn-primary">+ Add Product</a>
  </header>

  @if (session('success'))
    <div style="background:#dcfce7;border:1px solid #86efac;padding:0.875rem 1rem;border-radius:6px;margin-bottom:1.5rem;color:#166534;font-size:0.875rem;">
      {{ session('success') }}
    </div>
  @endif

  <!-- Stats row -->
  <div class="stats-row">
    <div class="stat-card">
      <span class="stat-value">{{ $totalCount }}</span>
      <span class="stat-label">Total products</span>
    </div>
    <div class="stat-card">
      <span class="stat-value">6</span>
      <span class="stat-label">Categories</span>
    </div>
    <div class="stat-card">
      <span class="stat-value">{{ $outOfStock }}</span>
      <span class="stat-label">Out of stock</span>
    </div>
  </div>

  <!-- Product table -->
  <div class="table-wrap">
    <table class="product-table">
      <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody>
      @forelse ($products as $product)
      <tr>
        <td>
          <div class="thumb-cell">
            <img src="{{ $product->image ? asset($product->image) : asset('assets/polo.png') }}" alt="{{ $product->name }}" />
          </div>
        </td>
        <td><span class="product-name-cell">{{ $product->name }}</span></td>
        <td><span class="badge">{{ $product->category }}</span></td>
        <td>€{{ number_format($product->price, 0) }}</td>
        <td>
          @if ($product->stock === 0)
            <span class="stock-none">0</span>
          @elseif ($product->stock <= 5)
            <span class="stock-low">{{ $product->stock }}</span>
          @else
            <span class="stock-ok">{{ $product->stock }}</span>
          @endif
        </td>
        <td>
          <div class="actions-cell">
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-action">Edit</a>
            <button class="btn-action btn-delete" onclick="confirmDelete({{ $product->id }}, '{{ addslashes($product->name) }}')">Delete</button>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="6" style="text-align:center;padding:2rem;color:#9ca3af;">No products found.</td>
      </tr>
      @endforelse
      </tbody>
    </table>
  </div>

  @if ($products->hasPages())
    <div style="margin-top:1rem;">{{ $products->links() }}</div>
  @endif

<!-- Delete confirm modal -->
<div class="modal-overlay" id="deleteModal" style="display:none;">
  <div class="modal">
    <h2 class="modal-title">Delete product?</h2>
    <p class="modal-text">Are you sure you want to delete <strong id="deleteProductName"></strong>? This action cannot be undone.</p>
    <div class="modal-actions">
      <button class="btn-action" onclick="closeModal()">Cancel</button>
      <form id="deleteForm" method="POST" style="display:inline;">
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
  function confirmDelete(id, name) {
    document.getElementById('deleteProductName').textContent = name;
    document.getElementById('deleteForm').action = '/admin/products/' + id;
    document.getElementById('deleteModal').style.display = 'flex';
  }
  function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
  }
</script>
@endsection
