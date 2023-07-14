@extends('layouts.main')

@section('content')
    <section id="semua-berita">
        <div class="container">
            <!-- breadcrumb -->
            {{-- <div class="container-breadcrumb">
                <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ekstrakurikuler.detail') }}">Sarana dan Prasarana</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $sarpras->nama_sarpras }}</li>
                    </ol>
                </nav>
            </div> --}}
            <!-- akhir breadcrumb -->

            <!-- Berita -->
            <div class="d-flex flex-wrap justify-content-lg-between">
                <div class="header-berita mb-3 col-lg-6">
                    <img src="{{ asset('img/ekskul') . '/' . $ekskul->gambar }}" class="img-fluid berita"
                        alt="{{ $ekskul->nama }}" />

                </div>
                <div class="col-lg-5">
                    <h1 class="fs-2">{{ $ekskul->nama }}</h1>

                    {{-- <p class="fs-6"><span><i class="fa-regular fa-circle-user"></i></span> {{ $sarpras->user->nama_user }}</p> --}}

                    <div class="border-bottom border-3 border-warning mb-3"></div>

                    <div class="paragraf">
                        {!! $ekskul->deskripsi !!}
                    </div>
                    <p class="mt-3">Pembina: <span class="fw-medium">{{ $ekskul->pembina }}</span></p>

                    <a href="{{ $ekskul->link_daftar }}" target="_blank" class="btn btn-success mt-3">Link Pendaftaran</a>
                </div>

            </div>


            <!-- Akhir Berita -->

        </div>
    </section>
@endsection
