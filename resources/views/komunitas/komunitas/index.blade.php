@extends('layouts.main')

@section('content')
    <section id="komunitas" class="py-5 my-3">
        <div class="container">
            <div class="d-flex justify-content-center mb-2">
                <h2 class="fw-semibold">Kegiatan Komunitas</h2>
            </div>
            <div class="border-bottom border-warning border-2 mb-3"></div>
            <div class="row d-flex flex-wrap justify-content-between">
                <div class="col-12 col-sm-9 d-flex flex-wrap justify-content-around justify-content-sm-start">
                    @foreach ($komunitas_posts as $kom)
                        <div class="card mb-3 shadow col-11">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset('img/komunitas' . '/' . $kom->gambar) }}" class="img-fluid"
                                        alt="{{ $kom->judul }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body p-3">
                                        <h5 class="card-title fs-3">{{ $kom->judul }}</h5>
                                        <p class="card-text text-success">{{ $kom->komunitas->nama_komunitas }}</p>
                                        <div class="border-bottom border-warning border-2  mb-3"></div>
                                        <div class="card-text fs-5">
                                            {!! Str::substr($kom->isi_post, 0, 100) !!}
                                        </div>
                                        <a href="{{ route('komunitas.post', ['slug' => $kom->slug]) }}"
                                            class="btn text-success ps-0"><span><i
                                                    class="fa-solid fa-angles-right"></i></span>
                                            Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 col-sm-3">
                    <h4>Komunitas Guru</h4>
                    <div class="border-bottom border-warning border-2 mb-3"></div>
                    @foreach ($komunitas as $kom)
                        <div class="card w-100 mb-3 shadow-sm">
                            <div class="card-body">
                                <a href="{{ route('komunitas.detail', ['id' => $kom->id]) }}">
                                    <h5 class="card-title m-0">{{ $kom->nama_komunitas }}</h5>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{ $komunitas_posts->links() }}
        </div>
    </section>
@endsection
