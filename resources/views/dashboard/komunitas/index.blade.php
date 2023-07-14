@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Komunitas Guru</h2>
        <div>
            <a href="{{ route('komunitas.create') }}" class="btn btn-primary fs-5"><span><i
                        class="fa-regular fa-square-plus"></i></span> Tambah
                Komunitas</a>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-start gap-5 mt-5">
        @foreach ($komunitas as $kom)
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('img/komunitas') . '/' . $kom->gambar }}" alt="{{ $kom->nama_komunitas }}"
                    class="img-fluid">
                <div class="card-body">
                    <h5 class="card-title">{{ $kom->nama_komunitas }}</h5>
                    <p>{!! $kom->deskripsi !!}</p>
                    <a href="{{ route('komunitas.anggota.index', ['id' => $kom->id]) }}">Lihat anggota</a>
                </div>
                <span class="position-absolute top-0 start-100 translate-middle pe-5 rounded-circle d-flex">
                    <span class="badge">
                        <a href="{{ route('komunitas.edit', ['slug' => $kom->slug]) }}"
                            class="btn btn-warning rounded-circle text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                    <span class="badge">
                        <a href="#" class="btn btn-danger delete rounded-circle" data-id="{{ $kom->slug }}"
                            data-judul="{{ $kom->nama_komunitas }}"><i class="fa-solid fa-trash"></i></a>
                    </span>

                </span>
            </div>
        @endforeach
    </div>
@endsection
