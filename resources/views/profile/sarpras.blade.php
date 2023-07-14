@extends('layouts.main')

@section('content')
<section id="semua-prestasi">
    <div class="container">
        <!-- breadcrumb -->
        <div class="container-breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sarana dan Prasarana</li>
                </ol>
            </nav>
        </div>
        <!-- akhir breadcrumb -->
        <h2 class="text-center mb-5">Sarana dan Prasarana SMP N 18 Medan</h2>

        <div class="d-flex flex-wrap justify-content-between justify-content-lg-center gap-lg-5">
          @foreach ($sarpras as $sar)
          <div class="card">
            <div class="header-card">
              <img src="{{ asset('img/sarpras').'/'.$sar->gambar }}" class="card-img-top" alt="{{ $sar->nama_sarpras }}">
            </div>
            <div class="card-body">
              <a href="{{ route('sarpras.detail', ['slug' => $sar->slug]) }}" class="card-text btn">{{ $sar->nama_sarpras }}</a>
              {{-- <p class=""></p> --}}
            </div>
        </div>
          @endforeach
            
        </div>
    </div>
</section>
@endsection