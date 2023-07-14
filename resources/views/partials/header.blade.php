<!-- Header -->
<header>
    <nav id="nav-scroll" class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo/logo Merdeka Mengajar.png') }}" alt="logo merdeka mengajar"
                    class="img-merdeka-mengajar">
                <span class="text-white mb-0 fs-6 fw-semibold d-inline d-sm-none d-lg-none ms-2">UPT SMP Negeri 18
                    Medan</span>
                <span class="text-white mb-0 fs-5 fw-semibold d-none d-sm-inline d-lg-none ms-2">UPT SMP Negeri 18
                    Medan</span>
                <span class="text-white mb-0 fs-4 fw-semibold d-none d-sm-none d-lg-inline  ms-2">UPT SMP Negeri 18
                    Medan</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"
                style="border: none;">
                <span class="fs-1 text-white"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-link {{ $active === 'profil' ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil Sekolah
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item fw-semibold" href="{{ route('sekapursirih') }}">Sekapur
                                    Sirih</a>
                            </li>
                            <li>
                                <a class="dropdown-item fw-semibold" href="{{ route('visi-misi') }}">Visi, Misi &
                                    Tujuan</a>
                            </li>
                            <li>
                                <a class="dropdown-item fw-semibold" href="{{ route('sarpras') }}">Sarana Prasarana</a>
                            </li>
                            <li>
                                <a class="dropdown-item fw-semibold" href="{{ route('staff') }}">Staff</a>
                            </li>
                            <li>
                                <a class="dropdown-item fw-semibold" href="{{ route('guru') }}">Guru</a>
                            </li>
                            <li>
                                <a class="dropdown-item fw-semibold" href="{{ route('siswa') }}">Siswa</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-link {{ $active === 'berita' ? 'active' : '' }}"
                            href="/#berita" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Berita
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/berita">Berita Terkini</a></li>
                            <li>
                                <a class="dropdown-item" href="/info">Info Sekolah</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-link {{ $active === 'prestasi' ? 'active' : '' }}"
                            href="/#prestasi">Prestasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-link {{ $active === 'komunitas' ? 'active' : '' }}"
                            href="/#komunitas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Komunitas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('komunitas') }}">Komunitas Guru</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('ekstrakurikuler.index') }}">Esktrakurikuler</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-link {{ $active === 'kewirausahaan' ? 'active' : '' }}"
                            href="{{ route('kewirausahaan') }}">Kewirausahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-link {{ $active === 'perpus' ? 'active' : '' }}"
                            href="{{ route('perpustakaan') }}">Perpustakaan</a>
                    </li>
                </ul>
                <span class="d-none d-lg-inline">
                    <img src="{{ asset('img/logo/merdeka belajar.png') }}" alt="logo merdeka belajar"
                        class="img-merdeka-belajar">
                </span>
            </div>

        </div>
    </nav>
</header>
<!-- Akhir Header -->
