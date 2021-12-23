<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="images/logo.png" alt="Logo" height="24px" class="w-100">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('tipe-wisma') }}" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        TIPE WISMA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('wisma-kurnia') }}">Wisma Kurnia Sejahtera</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('spbu-batangtoru') }}">SPBU Batangtoru</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('order') }}" class="btn btn-signin px-4 text-white nav-link">Pesan Wisma</a>
                </li>
            </ul>
        </div>
    </div>
</nav>