<header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ route('home') }}"><img src="{{ asset('img/Logo.png') }}" alt="Warung Makan Pak Bilal">Warung Makan Pak Bilal</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 {{ Request::is('products') ? 'active' : '' }}" aria-current="page" href="{{ route('products.index') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 {{ Request::is('about') ? 'active' : '' }}" aria-current="page" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 {{ Request::is('contact') ? 'active' : '' }}" aria-current="page" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('products.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                @guest
                    <ul class="navbar-nav">
                        <li class="login-button mx-lg-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">My Account</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('login') }}">Masuk Login</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">Daftar</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        <li class="akun-button mx-lg-2 dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('order.history') }}">
                                    History
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endguest
                <ul class="navbar-nav">
                    <li class="shope-button">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="cart-count" style="display: none;">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
