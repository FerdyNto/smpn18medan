@extends('layouts.main')

@section('content')
    <section id="prestasi">
        <div class="container">
            <div class="d-flex justify-content-center mb-2">
                <h2 class="fw-semibold">Ekstrakurikuler {{ $kat->nama_kategori_ekskul }}</h2>
            </div>
            <div class="border-bottom mb-3"></div>
            <div class="d-flex flex-wrap justify-content-around">
                @foreach ($ekskul as $eks)
                    <div class="card mb-3 shadow col-10">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="{{ asset('img/ekskul' . '/' . $eks->gambar) }}" class="img-fluid img-prestasi"
                                    alt="{{ $eks->nama }}">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body p-5">
                                    <h5 class="card-title fs-3">{{ $eks->nama }}</h5>
                                    </p>
                                    <div class="border-bottom  mb-3"></div>
                                    <p class="card-text"><span><i class="fa-regular fa-user"></i></span>
                                        {{ $eks->pembina }}
                                    </p>
                                    <div class="card-text fs-5">
                                        {!! Str::substr($eks->deskripsi, 0, 100) !!}
                                    </div>
                                    <a href="{{ route('ekstrakurikuler.show', ['id' => $eks->id]) }}"
                                        class="btn text-success ps-0"><span><i class="fa-solid fa-angles-right"></i></span>
                                        Lihat Detail</a>
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
@endsection
