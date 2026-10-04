<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 sticky-top">
    <div class="container">

        {{-- Logo / Nama Sekolah --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            SMK NEGERI 4 BOGOR
        </a>

        {{-- Tombol Mobile --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navMenu"
            aria-controls="navMenu"
            aria-expanded="false"
            aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

            {{-- Menu Navigasi --}}
            <ul class="navbar-nav mx-auto">

                {{-- Beranda --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ url('/') }}">
                        Beranda
                    </a>
                </li>

                {{-- Profil --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('profile') ? 'active' : '' }}"
                        href="{{ url('/profile') }}">
                        Profil
                    </a>
                </li>

                {{-- Informasi Umum --}}
                <li class="nav-item dropdown">
                    <a
                        class="nav-link {{ request()->is('fasilitas*') || request()->is('jurusan*') ? 'active' : '' }}"
                        href="#"
                        id="informasiDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Informasi Umum <span>▾</span>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="informasiDropdown">

                        <li>
                            <a class="dropdown-item" href="{{ url('/jurusan') }}">
                                Program Keahlian
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ url('/produk') }}">
                                Produk & Karya Siswa
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Berita --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('news*') ? 'active' : '' }}"
                        href="{{ url('/news') }}">
                        Berita
                    </a>
                </li>

                {{-- Galeri --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}"
                        href="{{ url('/gallery') }}">
                        Galeri
                    </a>
                </li>

                {{-- Kontak --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                        href="{{ url('/contact') }}">
                        Kontak
                    </a>
                </li>

            </ul>

            {{-- Login Admin --}}
            <a href="{{ route('admin.login') }}" class="btn btn-primary">
            Login Admin
            </a>

        </div>
    </div>
</nav>