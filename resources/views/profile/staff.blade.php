@extends('layouts.main')

@section('content')
<section id="semua-prestasi">
    <div class="container">
        <!-- breadcrumb -->
        <div class="container-breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Staff</li>
                </ol>
            </nav>
        </div>
        <!-- akhir breadcrumb -->

        <h2 class="text-center mb-5">Daftar Staff dan Pekerja SMP N 18 Medan</h2>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($staff as $s)
                <div class="card guru swiper-slide">
                    <img src="{{ asset('img/staff/'.$s->foto) }}" class="card-img-top guru" alt="{{ $s->nama }}">
                    <div class="card-body">
                        <h4 class="card-title m-0">{{ $s->nama }}</h4>
                        <p class="card-text mb-1">{{  date('d-m-Y', strtotime($s->tgl_lahir)); }}</p>
                        <p class="card-text mapel">{{ $s->jabatan }}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            {{-- <div class="swiper-pagination"></div> --}}
        </div>

        <div class="col-10 mx-auto">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="col-1">No</th>
                        <th class="col-5">Nama</th>
                        <th class="col-3">Tanggal Lahir</th>
                        <th class="col-3">Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($staff as $s)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ date('d-m-Y', strtotime($s->tgl_lahir)) }}</td>
                        <td>{{ $s->jabatan }}</td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
        
    </div>
</section>

 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

 <!-- Initialize Swiper -->
 <script>
     var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        centeredSlides: true,
        grabCursor: true,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        992: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
      },
     });
 </script>
@endsection