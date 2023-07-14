@extends('layouts.main')

@section('content')
    <section id="semua-prestasi">
        <div class="container">
            <!-- breadcrumb -->
            <div class="container-breadcrumb">
                <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sekapur Sirih</li>
                    </ol>
                </nav>
            </div>
            <!-- akhir breadcrumb -->
            <h1 class="text-center mb-5">Sekapur Sirih</h1>

            <div class="d-flex flex-wrap justify-content-lg-between mb-5">
                <div class="header-berita mb-3 col-lg-5">
                    <img src="{{ asset('img/kepsek') . '/' . $sekapursirih->gambar_kepsek }}" class="img-thumbnail"
                        alt="Kepala Sekolah SMP N 18 Medan" />

                </div>
                <div class="col-lg-6">
                    <h2 class="fs-2 mb-3">{{ $sekapursirih->nama_kepsek }}</h2>
                    <p>Kepala Sekolah SMP Negeri 18 Medan</p>

                    {{-- <p class="fs-6"><span><i class="fa-regular fa-circle-user"></i></span> {{ $sarpras->user->nama_user }}</p> --}}

                    <div class="border-bottom border-secondary-subtle mb-3"></div>

                    <div class="paragraf">
                        {!! $sekapursirih->sekapursirih !!}
                    </div>
                </div>
            </div>

            {{-- Penanggung Jawab Website --}}
            <h2 class="text-center mb-5 mt-5">Penanggung Jawab Website</h2>
            <div class="d-flex flex-wrap justify-content-around justify-content-lg-evenly">
                @foreach ($editor as $e)
                    <div class="card" style="width: 18rem; background-color: transparent;">
                        @if (!$e->gambar)
                            <img src="{{ asset('img/foto profil.jpg') }}" alt="{{ $e->nama_user }}"
                                class="img-thumbnail rounded-circle">
                        @else
                            <img src="{{ asset('img/user') . '/' . $e->gambar }}" alt="{{ $e->nama_user }}"
                                class="img-thumbnail rounded-circle">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $e->nama_user }}</h5>
                            @if ($e->lvl === 'author')
                                <p class="card-text">Editor</p>
                            @elseif($e->lvl === 'administrator')
                                <p class="card-text">Penanggung Jawab</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
