@extends('layouts.main')

@section('content')
    <section id="semua-berita">
        <div class="container">
            <!-- breadcrumb -->
            <div class="container-breadcrumb">
                <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('komunitas') }}">Komunitas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->judul }}</li>
                    </ol>
                </nav>
            </div>
            <!-- akhir breadcrumb -->

            <!-- Berita -->
            <div class="header-berita mb-3">
                <img src="/img/komunitas/{{ $post->gambar }}" class="img-fluid berita" alt="{{ $post->judul }}" />

                <div class="tanggal">
                    <span class="fs-5">{{ $post->created_at->format('d F Y') }}</span>
                </div>
            </div>
            <h1 class="fs-2 mb-3">{{ $post->judul }}</h1>

            <p class="fs-6 text-success"><span><i class="fa-solid fa-users-viewfinder"></i></span>
                {{ $post->komunitas->nama_komunitas }}
            </p>

            <div class="border-bottom border-warning-subtle border-2 mb-3"></div>

            <div class="paragraf">
                {!! $post->isi_post !!}
            </div>

            <!-- Akhir Berita -->

        </div>
    </section>
@endsection
