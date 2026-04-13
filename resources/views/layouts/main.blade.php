<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Liorenne')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('styles/css/variables.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/css/components.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/css/layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/css/search.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/css/wishlist.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/css/auth-panel.css') }}" />
    @yield('extra-css')
</head>
<body>

<header class="site-header">
    <div class="header-inner">
        <a class="logo" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.png') }}" alt="Liorenne" class="logo-img" />
        </a>
        <nav class="icon-nav">
            <a href="#" class="icon-link" aria-label="Search" id="searchBtn">
                <img src="{{ asset('assets/icons/search_logo.png') }}" alt="Search" />
            </a>
            <a href="{{ route('wishlist') }}" class="icon-link" aria-label="Wishlist">
                <img src="{{ asset('assets/icons/heart_logo.png') }}" alt="Wishlist" />
            </a>
            <a href="{{ route('cart') }}" class="icon-link" aria-label="Cart">
                <img src="{{ asset('assets/icons/cart_logo.png') }}" alt="Cart" />
            </a>
            <a href="#" class="icon-link" id="accountBtn" aria-label="Account">
                <img src="{{ asset('assets/icons/person_logo.png') }}" alt="Account" />
            </a>
        </nav>
    </div>

    <div class="search-bar" id="searchBar">
        <div class="search-bar-inner">
            <input type="text" id="searchInput" placeholder="Search for products..." autocomplete="off" />
            <div class="search-bar-divider"></div>
            <button class="search-close" id="searchClose">Close</button>
        </div>
    </div>
</header>

<script>
    const searchBtn   = document.getElementById('searchBtn');
    const searchBar   = document.getElementById('searchBar');
    const searchInput = document.getElementById('searchInput');
    const searchClose = document.getElementById('searchClose');

    searchBtn.addEventListener('click', (e) => {
        e.preventDefault();
        searchBar.classList.add('open');
        searchBtn.classList.add('search-active');
        setTimeout(() => searchInput.focus(), 350);
    });

    searchClose.addEventListener('click', () => {
        searchBar.classList.remove('open');
        searchBtn.classList.remove('search-active');
        searchInput.value = '';
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            searchBar.classList.remove('open');
            searchBtn.classList.remove('search-active');
            searchInput.value = '';
        }
    });

    document.addEventListener('click', (e) => {
        if (!searchBar.contains(e.target) && !searchBtn.contains(e.target)) {
            searchBar.classList.remove('open');
            searchBtn.classList.remove('search-active');
        }
    });
</script>

@yield('content')

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo.png') }}" alt="Liorenne" class="logo-img" />
            </a>
        </div>
        <div class="footer-cols">
            <div class="footer-col">
                <h4 class="footer-heading">SERVICES</h4>
                <ul class="footer-links">
                    <li><a href="/shipping">Shipping</a></li>
                    <li><a href="/returns">Returns</a></li>
                    <li><a href="/promotions">Promotions</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 class="footer-heading">CONTACT</h4>
                <ul class="footer-links">
                    <li><a href="/chat">Chat with us</a></li>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/store-locator">Store Locator</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 class="footer-heading">OUR COMPANY</h4>
                <ul class="footer-links">
                    <li><a href="/careers">Careers</a></li>
                    <li><a href="/investors">Investors</a></li>
                    <li><a href="/press">Press</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/auth-panel.js') }}"></script>
@yield('extra-js')

</body>
</html>
