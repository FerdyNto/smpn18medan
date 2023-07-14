<div class="col-12 col-lg-3 mt-5">
    <div class="row mb-3">
        <form action="{{ $cari_aktif == 'berita' ? route('cari.berita') : route('cari.info') }}" method="GET">
        {{-- <form action="{{  route('cari.berita') }}" method="GET"> --}}
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari" name="cari">
                <button class="btn btn-cari" type="submit" id="cari">Cari</button>
            </div>
        </form>
    </div>

    <div class="row">
        <h4>Kategori</h4>
        <div class="border-bottom mb-3"></div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/berita">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/info">Info Sekolah</a>
            </li>
        </ul>
    </div>
</div>