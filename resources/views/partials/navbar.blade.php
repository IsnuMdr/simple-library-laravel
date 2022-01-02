<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="/">MDR Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'Data Anggota') ? 'active' : '' }}" href="/anggota">Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'Kategori Buku') ? 'active' : '' }}" href="/kategori">Kategori Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'Daftar Buku') ? 'active' : '' }}" href="/buku">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'Data Transaksi') ? 'active' : '' }}" href="/transaksi">Transaksi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
