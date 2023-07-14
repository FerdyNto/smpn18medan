@extends('layouts.main')

@section('content')
<section id="semua-prestasi">
    <div class="container">
        <!-- breadcrumb -->
        <div class="container-breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
                </ol>
            </nav>
        </div>
        <!-- akhir breadcrumb -->

        <!-- Prestasi -->
        <div class="d-flex flex-wrap justify-content-between">
            @foreach ($prestasi as $p)
            <div class="card">
                <div class="header-card">
                    <img src="img/prestasi/{{ $p->gambar }}" class="card-img-top" alt="{{ $p->judul }}" />

                    <div class="tanggal">
                        <span class="fs-5 fw-bold">{{ $p->created_at->format('d F Y') }}</span>
                    </div>
                </div>


                <div class="card-body">
                    <h5 class="card-title fw-semibold fs-3">{{ $p->judul }}</h5>
                    <p class="card-text"><span><i class="fa-solid fa-user-group"></i></span> {{ $p->anggota }}</p>
                    <div class="card-text fs-5">
                       {!! Str::substr($p->deskripsi, 0, 100) !!}
                    </div>
                    <a href="/prestasi/{{ $p->slug }}" class="btn text-success ps-0"><span><i class="bi bi-chevron-double-right"></i></span> Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $prestasi->links() }}
        <!-- Akhir Prestasi -->




    </div>
</section>
@endsection