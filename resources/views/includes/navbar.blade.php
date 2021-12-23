<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ url('/images/logo.png') }}" alt="Logo" height="24px" class="w-100">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" type="button" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : ''}}">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{ request()->is('about') ? 'active' : ''}}">
                    <a href="{{ route('about') }}" class="nav-link">Tentang Homestead</a>
                </li>
                <li class="nav-item {{ request()->is('tipe-wisma') ? 'active' : ''}}">
                    <a href="{{ route('tipe-wisma') }}" class="nav-link">Tipe Wisma</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('order') }}" class="btn btn-signin px-4 text-white nav-link">Pesan Wisma</a>
                </li>
            </ul>
        </div>
    </div>
</nav>