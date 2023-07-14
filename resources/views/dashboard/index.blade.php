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
@endsection
