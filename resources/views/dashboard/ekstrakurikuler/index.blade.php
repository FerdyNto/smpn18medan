@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Ekstrakurikuler</h2>
        <div>
            <a href="{{ route('kategoriekskul.index') }}" class="btn btn-info text-white fs-5">Kategori Ekstrakurikuler</a>
            <a href="{{ route('ekskul.create') }}" class="btn btn-primary fs-5"><span><i
                        class="fa-regular fa-square-plus"></i></span> Tambah Ekstrakurikuler</a>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-start gap-5 mt-5">
        @foreach ($ekstrakurikuler as $eks)
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $eks->nama }}</h5>
                    <div class="card-text eks">
                        {{ $eks->pembina }}
                        {{-- {{ $eks->kategoriekskul->nama_kategori_ekskul }} --}}
                    </div>
                </div>
                <span class="position-absolute top-0 start-100 translate-middle pe-5 rounded-circle d-flex">
                    <span class="badge">
                        <a href="{{ route('ekskul.edit', ['id' => $eks->id]) }}"
                            class="btn btn-warning rounded-circle text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                    <span class="badge">
                        <a href="#" class="btn btn-danger delete rounded-circle" data-id="{{ $eks->id }}"
                            data-judul="{{ $eks->nama }}"><i class="fa-solid fa-trash"></i></a>
                    </span>
                    {{-- </span>
                <span class="position-absolute top-0 start-100 translate-middle rounded-circle"> --}}

                </span>
            </div>
        @endforeach

    </div>
@endsection
