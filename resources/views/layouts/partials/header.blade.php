<div class="header-top-stripe"></div>
<header>
    <div class="container header-container">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/logo.png') }}" alt="TrueNorth Logo">
            </a>
        </div>
        <label for="menu-toggle" class="mobile-menu-btn">
            <span></span><span></span><span></span>
        </label>
        <input type="checkbox" id="menu-toggle" class="menu-checkbox">
        <nav class="nav-wrapper">
            <ul class="nav-links">
                <li><a href="{{ route('home') }}"     class="{{ request()->routeIs('home')     ? 'active' : '' }}">HOME</a></li>
                <li><a href="{{ route('about') }}"    class="{{ request()->routeIs('about')    ? 'active' : '' }}">ABOUT US</a></li>
                <li><a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'active' : '' }}">PRODUCTS</a></li>
                <li class="mobile-only-nav">
                    <a href="{{ route('contact') }}"  class="{{ request()->routeIs('contact')  ? 'active' : '' }}">CONTACT</a>
                </li>
            </ul>
        </nav>
        <div class="header-actions">
            <a href="{{ route('contact') }}" class="btn-contact">CONTACT US</a>
        </div>
    </div>
</header>
<div class="header-bottom-stripe"></div>