@extends('layouts.main')

@section('content')
<section id="semua-berita">
    <div class="container">
        <!-- breadcrumb -->
        <div class="container-breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/prestasi">Prestasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $prestasi->judul }}</li>
                </ol>
            </nav>
        </div>
        <!-- akhir breadcrumb -->

        <!-- Berita -->
        <div class="header-berita mb-3">
            <img src="/img/prestasi/{{ $prestasi->gambar }}" class="img-fluid berita" alt="{{ $prestasi->judul }}" />

            <div class="tanggal">
                <span class="fs-5">{{ $prestasi->created_at->format('d F Y') }}</span>
            </div>
        </div>
        <h1 class="fs-2 mb-3">{{ $prestasi->judul }}</h1>

        <p class="fs-6"><span><i class="fa-solid fa-user-group"></i></span> {{ $prestasi->anggota }}</p>

        <div class="border-bottom border-secondary-subtle mb-3"></div>

        <div class="paragraf">
            {!! $prestasi->deskripsi !!}
        </div>
        <!-- Akhir Berita -->

    </div>
</section>
@endsection