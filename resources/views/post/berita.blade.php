@extends('layouts.main')

@section('content')
<section id="semua-berita">
    <div class="container">
        <!-- breadcrumb -->
        <div class="container-breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
        <!-- akhir breadcrumb -->

        <!-- navigasi -->
        <div class="d-flex flex-column-reverse flex-lg-row justify-content-lg-between">
            <!-- navigasi -->
            @include('partials.sideNavBerita')
            <!-- akhir navigasi -->

            <!-- Berita -->
            <div class="col-12 col-lg-8 d-flex flex-wrap justify-content-between">
                @if ($berita->count() > 0)
                @foreach ($berita as $b)
                <div class="card">
                    <div class="header-card">
                        <img src="{{ asset('img/berita/'.$b->gambar)}}" class="card-img-top" alt="{{ $b->judul }}" />

                        <div class="tanggal">
                            <span class="fs-5">{{ $b->created_at->format('d F Y') }}</span>
                        </div>
                    </div>


                    <div class="card-body">
                        <h5 class="card-title fs-3">{{ $b->judul }}</h5>
                        <div class="card-text fs-5">
                            {!! Str::substr($b->isi_berita, 0, 100) !!}
                        </div>
                        <a href="/berita/{{ $b->slug }}" class="btn text-success ps-0"><span><i class="fa-solid fa-angles-right"></i></span> Baca Selengkapnya</a>
                    </div>
                </div> 
                @endforeach
                @else
                <h2>Berita / Info Tidak ditemukan</h2>
                @endif
               
            </div>
            
            <!-- akhir Berita -->
        </div>
        {{ $berita->links() }}
    </div>
</section>
@endsection