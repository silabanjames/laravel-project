<nav class="navbar navbar-expand-lg bg-danger navbar-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link {{ Request::is('home') ? 'active' : ''}}" href="/home">Home</a>
            <a class="nav-link {{ Request::is('about') ? 'active' : ''}}" href="/about">About</a>
            <a class="nav-link {{ Request::is('blog') ? 'active' : ''}}" href="/posts">Blog</a>
            <a class="nav-link {{ Request::is('categories') ? 'active' : ''}}" href="/categories">Categories</a>
        </div>

        @auth
        <div class="nav-item dropdown ms-auto ">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard">My Dasboard</a></li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Log out</a></button>
                </form>
            </li>
            {{-- <li><a class="" href="/logout"> </li> --}}
            </ul>
        </div>
        @else

        <div class="navbar-nav ms-auto">
            <a class="nav-link {{ ($active == 'login') ? 'active' : ''}}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </div>

        @endauth

        </div>
    </div>
</nav>