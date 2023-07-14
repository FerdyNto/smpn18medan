@extends('layouts.main')

@section('content')
<section id="semua-berita">
    <div class="container">
        <!-- breadcrumb -->
        <div class="container-breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    @if ($k==='berita')
                    <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
                    @elseif($k==='info')
                    <li class="breadcrumb-item"><a href="/info">Info</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ $berita->judul }}</li>
                </ol>
            </nav>
        </div>
        <!-- akhir breadcrumb -->

        <!-- Berita -->
        <div class="header-berita mb-3">
            <img src="/img/berita/{{ $berita->gambar }}" class="img-fluid berita" alt="{{ $berita->judul }}" />

            <div class="tanggal">
                <span class="fs-5">{{ $berita->created_at->format('d F Y') }}</span>
            </div>
        </div>
        <h1 class="fs-2 mb-3">{{ $berita->judul }}</h1>

        <p class="fs-6"><span><i class="fa-regular fa-circle-user"></i></span> {{ $berita->user->nama_user }}</p>

        <div class="border-bottom border-secondary-subtle mb-3"></div>

        <div class="paragraf">
            {!! $berita->isi_berita !!}
        </div>
       
        <!-- Akhir Berita -->

    </div>
</section>
@endsection