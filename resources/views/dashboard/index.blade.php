@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Dashboard</h2>
    </div>
    <div class="d-flex justify-content-between">
        <div class="card w-25 border border-0 border-start border-3 border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title fs-5 text-primary">Berita Sekolah</h5>
                        <p class="card-text fs-3 fw-semibold">{{ @count($berita) }}
                        </p>
                    </div>
                    <div>
                        <span class="ms-5 display-1 text-primary"><i class="fa-regular fa-newspaper"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card w-25 border border-0 border-start border-3 border-secondary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title fs-5 text-secondary">Info Sekolah</h5>
                        <p class="card-text fs-3 fw-semibold">{{ @count($info) }}
                        </p>
                    </div>
                    <div>
                        <span class="ms-5 display-1 text-secondary"><i class="fa-solid fa-circle-info"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card w-25 border border-0 border-start border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title fs-5 text-warning">Prestasi</h5>
                        <p class="card-text fs-3 fw-semibold">{{ @count($prestasi) }}
                        </p>
                    </div>
                    <div>
                        <span class="ms-5 display-1 text-warning"><i class="fa-solid fa-trophy"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card w-25 border border-0 border-start border-3 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title fs-5 text-danger">Komunitas</h5>
                        <p class="card-text fs-3 fw-semibold">{{ @count($komunitas) }}
                        </p>
                    </div>
                    <div>
                        <span class="ms-5 display-1 text-danger"><i class="fa-solid fa-users-viewfinder"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h3 class="mb-3">Penanggung Jawab & Pengelola</h3>

        @foreach ($users as $user)
            <div class="card w-100 mb-3 border-0">
                <div class="d-flex">
                    @if (!$user->gambar)
                        <img src="{{ asset('img/foto profil.jpg') }}" alt="{{ $e->nama_user }}"
                            class="img-thumbnail rounded-circle" width="100px">
                    @else
                        <img src="{{ asset('img/user') . '/' . $user->gambar }}" alt="{{ $user->nama_user }}"
                            class="img-thumbnail rounded-circle" width="100px">
                    @endif


                    <div class="card-body">
                        <h5 class="card-title">{{ $user->nama_user }}<span>( {{ $user->username }} )</span></h5>
                        <p class="card-text">{{ $user->lvl }}</p>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
@endsection
