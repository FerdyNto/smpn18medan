@extends('layouts.main')

@section('content')
    <section id="hero">
        <div class="position-relative">
            <div class="overlay"></div>
            <div class="mb-5 position-absolute top-50 translate-middle">
                <h1 class="text-center text-white text-usaha mb-3">Kewirausahaan UPT SMP Negeri 18 Medan</h1>
                <div class="row">
                    <div class="col-lg-4 mx-auto d-grid">
                        <a href="#usaha" class="btn btn-success btn-lg shadow">Lihat Produk / Jasa</a>
                    </div>
                </div>
            </div>
            <img src="{{ asset('img/banner/banner kewirausahaan.jpg') }}" alt="Kewirausahaan SMP N 18 Medan" class="banner">
        </div>
    </section>

    <section id="usaha">
        <div class="container">
            <div class="d-flex flex-column-reverse flex-lg-row justify-content-lg-between">
                <div class="col-12 col-lg-4 my-3">
                    <div class="row mb-3">
                        <form action="{{ route('kewirausahaan') }}" method="GET">
                            <div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari" name="cari">
                                    <select class="form-select" aria-label="Default select" name="kategori">
                                        <option value="" selected>-- Kategori --</option>
                                        <option value="Produk">Produk</option>
                                        <option value="Jasa">Jasa</option>
                                    </select>
                                    <button class="btn btn-cari" type="submit" id="cari">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <h4>Berita / Info Terbaru</h4>
                        <div class="border-bottom mb-3"></div>
                        <ul class="nav flex-column">
                            @foreach ($berita as $item)
                                @if ($item->kategori->nama_kategori == 'Berita')
                                    <li class="nav-item">
                                        <a class="nav-link text-dark"
                                            href="{{ route('berita.detail', ['slug' => $item->slug]) }}">{{ $item->judul }}</a>
                                    </li>
                                @elseif($item->kategori->nama_kategori == 'Info')
                                    <li class="nav-item">
                                        <a class="nav-link text-dark"
                                            href="{{ route('info.detail', ['slug' => $item->slug]) }}">{{ $item->judul }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-lg-7 my-3">
                    <div class="d-flex flex-wrap justify-content-start gap-3 gap-md-5">
                        @if ($usaha->count() > 0)
                            @foreach ($usaha as $u)
                                <div class="card shadow">
                                    @if ($u->kategori === 'Produk')
                                        <img src="{{ asset('img/produk') . '/' . $u->gambar }}" class="card-img-top"
                                            alt="{{ $u->nama }}">
                                    @elseif($u->kategori === 'Jasa')
                                        <img src="{{ asset('img/jasa') . '/' . $u->gambar }}" class="card-img-top"
                                            alt="{{ $u->nama }}">
                                    @endif

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $u->nama }}</h5>
                                        <p class="card-text">{!! $u->deskripsi !!}</p>
                                        @if ($u->kategori === 'Produk')
                                            <div class="d-grid">
                                                <a href="https://api.whatsapp.com/send?phone={{ $u->kontak }}&text={{ $u->pesan }}"
                                                    class="btn btn-success" target="_blank"><span class="fs-5"><i
                                                            class="fa-brands fa-whatsapp"></i></span> <span
                                                        class="d-none d-md-inline">Hubungi Penjual</span></a>
                                            </div>
                                        @elseif($u->kategori === 'Jasa')
                                            <div class="d-grid">
                                                <a href="https://api.whatsapp.com/send?phone={{ $u->kontak }}&text={{ $u->pesan }}"
                                                    class="btn btn-success" target="_blank"><span class="fs-5"><i
                                                            class="fa-brands fa-whatsapp"></i></span> <span
                                                        class="d-none d-md-inline">Hubungi Penyedia
                                                        Jasa</span></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h2>Produk / Jasa Tidak ditemukan</h2>
                        @endif

                    </div>
                </div>

            </div>
            <!-- Berita -->

            {{ $usaha->links() }}
        </div>
    </section>
@endsection
