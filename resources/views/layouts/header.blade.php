<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Rental Mobil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pesanan</a>
                </li>
                <li class="nav-item">
                    @auth
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link">
                                Logout
                            </button>
                        </form>
                    @else
                        <a class="nav-link" href="/login">Login</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
