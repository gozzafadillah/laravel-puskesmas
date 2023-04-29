<div class="position-absolute px-3 py-1 text-light col-md "
    style="background-color: rgba(0, 0, 0, 0.7); font-size: 12px;">
    <?php setlocale(LC_TIME, 'id_ID'); ?>
    <p> {{ strftime('%A, %d %B %Y') }}</p>
</div>

<img src="{{ asset('img/bar subang.jpg') }}" class="img-fluid col-lg-4 img-responsive" style="width: 100%; height: auto;">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <a class="navbar-brand fs-3 font-weight-bold" href="/posts">Puskesmas Binong</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'posts' ? 'active' : '' }}" href="/posts">Home</a>
                </li>


                <li class="nav-item ">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Kategori
                        Informasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">Tentang Puskesmas</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Selamat Datang, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house-door"></i> My Dashboard</a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-door-open-fill"></i>
                            Login Akun
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a href="/login" class="nav-link {{ $active === 'login' ? 'login' : '' }}"><i
                                        class="bi bi-person"></i> Login</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="/register" class="nav-link {{ $active === 'login' ? 'register' : '' }}"><i
                                        class="bi bi-box-arrow-in-right"></i> Register</a></li>
                        </ul>
                    </div>
                @endauth
            </ul>
        </div>

    </div>
    <ul class="navbar-nav mr-3">
        <li class="nav-item">
            <!-- Tombol cari -->
            <button class="btn btn-outline-secondary bg-dark border-0 d-inline text-light" type="button"
                data-bs-toggle="modal" data-bs-target="#tombolcari"><i class="bi bi-search"></i> Pencarian</button>

            <!-- Modal -->
            <div class="modal fade" id="tombolcari" tabindex="-1" aria-labelledby="tombolcariLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tombolcariLabel">Halaman Pencarian <i class="bi bi-search"></i>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/posts">

                                @if (request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                @if (request('author'))
                                    <input type="hidden" name="author" value="{{ request('author') }}">
                                @endif

                                <div class="input-group mb-3" style="width: 450px;">
                                    <input type="text" class="form-control" placeholder="Search..." name="search"
                                        value="{{ request('search') }}">
                                    <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

        </li>
    </ul>
</nav>
