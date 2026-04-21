<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin — Liorenne')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@400;700&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('styles/css/admin.css') }}" />
  @yield('extra-css')
</head>
<body class="admin-page">

<!-- ── Sidebar ── -->
<aside class="sidebar">
  <div class="sidebar-brand">LIORENNE</div>
  <nav class="sidebar-nav">
    <a href="{{ url('/admin/dashboard') }}" class="nav-item">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
      Products
    </a>
    <a href="{{ url('/admin/products/create') }}" class="nav-item">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Add Product
    </a>
  </nav>
  <form action="{{ route('admin.logout') }}" method="POST" style="margin:0">
    @csrf
    <button type="submit" class="sidebar-logout" style="background:none;border:none;cursor:pointer;width:100%;text-align:left;">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
      Sign Out
    </button>
  </form>
</aside>

<!-- ── Main ── -->
<main class="main">
  @yield('content')
</main>

@yield('extra-js')
</body>
</html>
