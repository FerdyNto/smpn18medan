<!-- Footer -->
<footer>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-12 col-lg-5 mb-5">
                <div class="row d-flex flex-row flex-lg-column">
                    <div class="col-sm-6 col-lg-12">
                        <h2>UPT SMP Negeri 18 Medan</h2>
                        <div class="col-12 mt-3 d-flex flex-column justify-content-center">
                            <p><span class="me-2"><i class="fa-solid fa-envelope"></i></span> {{ $kontak->email }}</p>
                            <p><span class="me-2"><i class="fa-solid fa-location-dot"></i></span> {{ $kontak->alamat }}
                            </p>
                            <p><span class="me-2"><i class="fa-solid fa-phone"></i></span> {{ $kontak->telp }}</p>
                        </div>
                    </div>

                    {{-- <div class="col-12">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8929324252717!2d98.63072261534005!3d3.611962651138944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031306ecec0d52f%3A0x2d0ff7d9407722ba!2sSMP%20Negeri%2018%20Medan!5e0!3m2!1sid!2sid!4v1681201754978!5m2!1sid!2sid"
                            class="map" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div> --}}
                    <div class="col-sm-6">
                        <h5 class="mt-3 mt-sm-0 mt-lg-3">Sosial Media</h5>
                        <div class="d-flex gap-3 sosmed">
                            <a href="" class="text-white fs-5"><i class="fa-brands fa-instagram"></i></a>
                            <a href="" class="text-white fs-5"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="" class="text-white fs-5"><i class="fa-brands fa-youtube"></i></a>
                            <a href="" class="text-white fs-5"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-1"></div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <h4>Profil Sekolah</h4>
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('sekapursirih') }}">Sekapur Sirih</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('visi-misi') }}">Visi, Misi & Tujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('sarpras') }}">Sarana Prasarana</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('staff') }}">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('guru') }}">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('siswa') }}">Siswa</a>
                    </li>
                </ul>
            </div>

            <div class=" col-sm-6 col-lg-3 mb-5">
                <h4>Postingan</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('berita') }}">Berita Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('info') }}">Info Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('prestasi') }}">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 mt-3" href="{{ route('komunitas') }}">Komunitas</a>
                    </li>
                </ul>
            </div>


        </div>

    </div>
    <div class="container-fluid">
        <div class="border-bottom mb-3"></div>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-around justify-content-lg-between px-5">
                <p>&copy; 2023 - SMP N 18 Medan</p>
            </div>
        </div>
    </div>

</footer>
<!-- Akhir Footer -->
