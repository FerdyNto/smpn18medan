@extends('layouts.main')

@section('content')
    <!-- Hero -->
    <section id="hero">
        <div class="position-relative">
            <div class="position-absolute">
                <div class="d-flex justify-content-between justify-content-md-end">
                    <img src="{{ asset('img/logo/sekolah penggerak.png') }}" alt="logo sekolah penggerak"
                        class="img-logo-skolah-penggerak">
                    <span class="d-lg-none d-inline">
                        <img src="{{ asset('img/logo/merdeka belajar.png') }}" alt="logo merdeka belajar"
                            class="img-merdeka-belajar">
                    </span>
                </div>
            </div>
            <img src="{{ asset('img/banner') . '/' . $banner->banner }}" alt="SMP N 18 Medan" class="banner" />
            <div class="position-absolute text-white">
                <span>Selamat Datang di</span>
                <h1>SMP Negeri 18 Medan</h1>
            </div>
        </div>
    </section>
    <!-- Akhir Hero -->
    <div data-bs-spy="scroll" data-bs-target="#nav-scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
        class="scrollspy-example" tabindex="0">
        <!-- Berita -->
        <section id="berita">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between mb-2">
                    <h2 class="fw-semibold">Berita / Info Terkini</h2>
                    <div class="btn-lainnya">
                        <a href="/berita" class="btn fw-semibold">Berita Lainnya</a>
                    </div>
                </div>
                <div class="border-bottom mb-3"></div>

                <div class="d-flex flex-wrap gap-5 justify-content-evenly">
                    @foreach ($berita as $b)
                        <div class="card shadow">
                            <div class="header-card">
                                <img src="img/berita/{{ $b->gambar }}" class="card-img-top" alt="{{ $b->judul }}" />

                                <div class="tanggal">
                                    <span class="fs-6">{{ $b->created_at->format('d F Y') }}</span>
                                </div>
                            </div>


                            <div class="card-body">
                                <h5 class="card-title fs-4">{{ $b->judul }}</h5>
                                <p class="card-text">kategori : {{ $b->kategori->nama_kategori }}</p>
                                <div class="border-bottom mb-3"></div>
                                <div class="card-text fs-6">
                                    {!! Str::substr($b->isi_berita, 0, 100) !!}
                                </div>
                                @if ($b->kategori->nama_kategori === 'Berita')
                                    <a href="{{ '/berita/' . $b->slug }}" class="btn text-success ps-0"><span><i
                                                class="fa-solid fa-angles-right"></i></span> Baca Selengkapnya</a>
                                @elseif($b->kategori->nama_kategori === 'Info')
                                    <a href="{{ '/info/' . $b->slug }}" class="btn text-success ps-0"><span><i
                                                class="fa-solid fa-angles-right"></i></span> Baca Selengkapnya</a>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="btn-lainnya mobile">
                    <a href="/berita" class="btn fw-semibold">Berita Lainnya</a>
                </div>

            </div>
        </section>
        <!-- Akhir Berita -->

        <!-- Prestasi -->
        <section id="prestasi">
            <div class="container">
                <div class="d-flex justify-content-between mb-2">
                    <h2 class="fw-semibold">Prestasi</h2>
                    <div class="btn-lainnya">
                        <a href="/prestasi" class="btn fw-semibold">Prestasi Lainnya</a>
                    </div>
                </div>
                <div class="border-bottom mb-3"></div>
                <div class="d-flex flex-wrap">
                    @foreach ($prestasi as $p)
                        <div class="card mb-3 shadow">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="img/prestasi/{{ $p->gambar }}" class="img-fluid img-prestasi"
                                        alt="{{ $p->judul }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body p-5">
                                        <h5 class="card-title fs-3">{{ $p->judul }}</h5>
                                        <p class="card-text"><small
                                                class="text-body-secondary">{{ $p->created_at->format('d F Y') }}</small>
                                        </p>
                                        <div class="border-bottom  mb-3"></div>
                                        <p class="card-text"><span><i class="fa-solid fa-user-group"></i></span>
                                            {{ $p->anggota }}</p>
                                        <div class="card-text fs-5">
                                            {!! Str::substr($p->deskripsi, 0, 100) !!}
                                        </div>
                                        <a href="{{ '/prestasi/' . $p->slug }}" class="btn text-success ps-0"><span><i
                                                    class="fa-solid fa-angles-right"></i></span> Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="btn-lainnya mobile">
                    <a href="/prestasi" class="btn fw-semibold">Prestasi Lainnya</a>
                </div>
            </div>
        </section>
        <!-- Akhir Prestasi -->

        {{-- Komunitas --}}
        <section id="komunitas">
            <div class="container">
                <div class="d-flex justify-content-between mb-2">
                    <h2 class="fw-semibold">Komunitas</h2>
                    <div class="btn-lainnya">
                        <a href="{{ route('komunitas') }}" class="btn fw-semibold">Komunitas Lainnya</a>
                    </div>
                </div>
                <div class="border-bottom mb-3"></div>
                <div class="d-flex flex-wrap">
                    @foreach ($komunitas as $k)
                        <div class="card mb-3 shadow">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset('img/komunitas') . '/' . $k->gambar }}"
                                        class="img-fluid img-prestasi" alt="{{ $k->judul }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body p-5">
                                        <h5 class="card-title fs-3">{{ $k->judul }}</h5>
                                        <p class="card-text"><small
                                                class="text-body-secondary">{{ $k->created_at->format('d F Y') }}</small>
                                        </p>
                                        <div class="border-bottom  mb-3"></div>
                                        <p class="card-text"><span><i class="fa-solid fa-users-viewfinder"></i></span>
                                            {{ $k->komunitas->nama_komunitas }}</p>
                                        <div class="card-text fs-5">
                                            {!! Str::substr($k->isi_post, 0, 100) !!}
                                        </div>
                                        <a href="{{ route('komunitas.post', ['slug' => $k->slug]) }}"
                                            class="btn text-success ps-0"><span><i
                                                    class="fa-solid fa-angles-right"></i></span> Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="btn-lainnya mobile">
                    <a href="{{ route('komunitas') }}" class="btn fw-semibold">Komunitas Lainnya</a>
                </div>
            </div>
        </section>
        {{-- AkhirKomunitas --}}

    </div>
@endsection
