<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse mt-5">
    <div class="position-sticky pt-3 sidebar-sticky">
        <h6
            class="sidebar-heading justify-content-between align-items-center px-3 mb-1 text-body-secondary text-uppercase">
            <span>Dashboard</span>
        </h6>
        <ul class="nav flex-column mb-5">
            <li class="nav-item">
                <a class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}" aria-current="page"
                    href="{{ route('dashboard.index') }}">
                    <span class="me-2"><i class="fa-solid fa-gauge"></i></span> Dashboard
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading justify-content-between align-items-center px-3 mb-1 text-body-secondary text-uppercase">
            <span>Postingan</span>
        </h6>
        <ul class="nav flex-column mb-5">
            <li class="nav-item">
                <a class="nav-link {{ $active === 'berita' ? 'active' : '' }}" aria-current="page"
                    href="{{ route('berita.index') }}">
                    <span class="me-2"><i class="fa-regular fa-newspaper"></i></span> Berita Sekolah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active === 'info' ? 'active' : '' }}" aria-current="page"
                    href="{{ route('info.index') }}">
                    <span class="me-2"><i class="fa-solid fa-circle-info"></i></span> Info Sekolah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active === 'prestasi' ? 'active' : '' }}" href="{{ route('prestasi.index') }}">
                    <span class="me-2"><i class="fa-solid fa-trophy"></i></span> Prestasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active === 'komunitas-posts' ? 'active' : '' }}"
                    href="{{ route('komunitas_posts.index') }}">
                    <span class="me-2"><i class="fa-solid fa-users-viewfinder"></i></span> Komunitas
                </a>
            </li>

        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Profil Sekolah</span>
        </h6>
        <ul class="nav flex-column mb-5">
            <li class="nav-item">
                <a class="nav-link {{ $active === 'sekapursirih' ? 'active' : '' }}"
                    href="{{ route('profile.sekapursirih') }}">
                    <span class="me-2"><i class="fa-regular fa-note-sticky"></i></span> Sekapur Sirih
                </a>
            </li>
            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'visi-misi' ? 'active' : '' }}"
                        href="{{ route('profile.visi-misi') }}">
                        <span class="me-2"><i class="fa-solid fa-thumbtack"></i></span> Visi & Misi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'sarpras' ? 'active' : '' }}"
                        href="{{ route('profile.sarpras') }}">
                        <span class="me-2"><i class="fa-regular fa-building"></i></span> Sarana Prasarana
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $active === 'kontak' ? 'active' : '' }}" href="{{ route('kontak.index') }}">
                        <span class="me-2"><i class="fa-solid fa-address-book"></i></span> Kontak
                    </a>
                </li>
            </ul>


            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Komunitas</span>
            </h6>
            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'ekskul' ? 'active' : '' }}" href="{{ route('ekskul.index') }}">
                        <span class="me-2"><i class="fa-solid fa-person-circle-check"></i></span> Ekstrakurikuler
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'komunitas' ? 'active' : '' }}"
                        href="{{ route('komunitas.index') }}">
                        <span class="me-2"><i class="fa-solid fa-person-circle-check"></i></span> Komunitas Guru
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Data Peserta Didik</span>
            </h6>
            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'siswa' ? 'active' : '' }}" href="{{ route('siswa.index') }}">
                        <span class="me-2"><i class="fa-solid fa-graduation-cap"></i></span> Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'kelas' ? 'active' : '' }}" href="{{ route('kelas.index') }}">
                        <span class="me-2"><i class="fa-solid fa-school"></i></span> Kelas
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Perpustakaan (Modul Belajar)</span>
            </h6>
            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'perpus' ? 'active' : '' }}" href="{{ route('perpus.index') }}">
                        <span class="me-2"><i class="fa-solid fa-book"></i></span> Data Buku (Modul)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'mapel' ? 'active' : '' }}" href="{{ route('mapel.index') }}">
                        <span class="me-2"><i class="fa-solid fa-bookmark"></i></span> Mata Pelajaran
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Data Kewirausahaan</span>
            </h6>
            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'produk' ? 'active' : '' }}" href="{{ route('produk.index') }}">
                        <span class="me-2"><i class="fa-solid fa-cubes"></i></span> Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'jasa' ? 'active' : '' }}" href="{{ route('jasa.index') }}">
                        <span class="me-2"><i class="fa-solid fa-toolbox"></i></span> Jasa
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Struktur Organisasi</span>
            </h6>

            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'guru' ? 'active' : '' }}" href="{{ route('profile.guru') }}">
                        <span class="me-2"><i class="fa-solid fa-person-chalkboard"></i></span> Guru
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'staff' ? 'active' : '' }}"
                        href="{{ route('profile.staff') }}">
                        <span class="me-2"><i class="fa-solid fa-clipboard-user"></i></span> Staff
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>User</span>
            </h6>

            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'profil-user' ? 'active' : '' }}"
                        href="{{ route('user.profil', ['username' => Auth::user()->username]) }}">
                        <span class="me-2"><i class="fa-solid fa-user"></i></span> Profil Editor
                    </a>
                </li>
                <li class="nav-item  {{ Auth::user()->lvl === 'author' ? 'd-none' : '' }} ">
                    <a class="nav-link {{ $active === 'user' ? 'active' : '' }}" href="{{ route('user.index') }}">
                        <span class="me-2"><i class="fa-solid fa-person-chalkboard"></i></span> Data Editor
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading justify-content-between align-items-center px-3 mb-1 text-body-secondary text-uppercase">
                <span>Website</span>
            </h6>
            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a href="{{ route('index.banner') }}"
                        class="nav-link {{ $active === 'heroimage' ? 'active' : '' }}">
                        <span class="me-2"><i class="fa-solid fa-globe"></i></span> Gambar Banner
                    </a>
                    <a href="/" target="_blank" class="nav-link">
                        <span class="me-2"><i class="fa-solid fa-earth-asia"></i></span> Website SMP N 18 Medan
                    </a>
                </li>
            </ul>
    </div>
</nav>
