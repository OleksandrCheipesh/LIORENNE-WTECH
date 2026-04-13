@extends('layouts.admin')

@section('title', 'Dashboard — Liorenne Admin')

@section('content')

  <header class="page-header">
    <div>
      <h1 class="page-title">Products</h1>
      <p class="page-sub">Manage your product catalogue</p>
    </div>
    <a href="{{ url('/admin/products/create') }}" class="btn-primary">+ Add Product</a>
  </header>

  <!-- Stats row -->
  <div class="stats-row">
    <div class="stat-card">
      <span class="stat-value">124</span>
      <span class="stat-label">Total products</span>
    </div>
    <div class="stat-card">
      <span class="stat-value">6</span>
      <span class="stat-label">Categories</span>
    </div>
    <div class="stat-card">
      <span class="stat-value">18</span>
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
      <tr>
        <td><div class="thumb-cell"><img src="https://via.placeholder.com/48x60/f0f0f0/999" alt="" /></div></td>
        <td><span class="product-name-cell">Polo Shirt</span></td>
        <td><span class="badge">Men</span></td>
        <td>€150</td>
        <td><span class="stock-ok">32</span></td>
        <td>
          <div class="actions-cell">
            <a href="{{ url('/admin/products/1/edit') }}" class="btn-action">Edit</a>
            <button class="btn-action btn-delete">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td><div class="thumb-cell"><img src="https://via.placeholder.com/48x60/f0f0f0/999" alt="" /></div></td>
        <td><span class="product-name-cell">Silk Evening Dress</span></td>
        <td><span class="badge">Women</span></td>
        <td>€189</td>
        <td><span class="stock-ok">14</span></td>
        <td>
          <div class="actions-cell">
            <a href="{{ url('/admin/products/1/edit') }}" class="btn-action">Edit</a>
            <button class="btn-action btn-delete">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td><div class="thumb-cell"><img src="https://via.placeholder.com/48x60/f0f0f0/999" alt="" /></div></td>
        <td><span class="product-name-cell">Cashmere Sweater</span></td>
        <td><span class="badge">Women</span></td>
        <td>€245</td>
        <td><span class="stock-low">3</span></td>
        <td>
          <div class="actions-cell">
            <a href="{{ url('/admin/products/1/edit') }}" class="btn-action">Edit</a>
            <button class="btn-action btn-delete">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td><div class="thumb-cell"><img src="https://via.placeholder.com/48x60/f0f0f0/999" alt="" /></div></td>
        <td><span class="product-name-cell">Leather Belt Bag</span></td>
        <td><span class="badge">Accessories</span></td>
        <td>€320</td>
        <td><span class="stock-none">0</span></td>
        <td>
          <div class="actions-cell">
            <a href="{{ url('/admin/products/1/edit') }}" class="btn-action">Edit</a>
            <button class="btn-action btn-delete">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <td><div class="thumb-cell"><img src="https://via.placeholder.com/48x60/f0f0f0/999" alt="" /></div></td>
        <td><span class="product-name-cell">Kids Parka Jacket</span></td>
        <td><span class="badge">Kids</span></td>
        <td>€95</td>
        <td><span class="stock-ok">27</span></td>
        <td>
          <div class="actions-cell">
            <a href="{{ url('/admin/products/1/edit') }}" class="btn-action">Edit</a>
            <button class="btn-action btn-delete">Delete</button>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>

<!-- Delete confirm modal -->
<div class="modal-overlay" id="deleteModal">
  <div class="modal">
    <h2 class="modal-title">Delete product?</h2>
    <p class="modal-text">Are you sure you want to delete <strong id="deleteProductName"></strong>? This action cannot be undone.</p>
    <div class="modal-actions">
      <button class="btn-action">Cancel</button>
      <button class="btn-action btn-delete">Delete</button>
    </div>
  </div>
</div>

@endsection
