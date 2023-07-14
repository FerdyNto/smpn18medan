@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Kategori Ekstrakurikuler</h2>
        <div>
            <a href="{{ route('ekskul.index') }}" class="btn btn-secondary fs-5">Kembali</a>
            <a href="{{ route('kategoriekskul.create') }}" class="btn btn-primary fs-5"><span><i
                        class="fa-regular fa-square-plus"></i></span> Tambah Kategori</a>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-start gap-5 mt-5">
        @foreach ($kategorieks as $eks)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('img/ekskul') . '/' . $eks->gambar }}" alt="{{ $eks->nama_kategori_ekskul }}"
                    class=" img-fluid">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $eks->nama_kategori_ekskul }}</h5>
                </div>
                {{-- <span class="position-absolute top-0 start-100 translate-middle rounded-circle">
                    <span class="badge"> --}}
                {{-- <form action="{{ route('ekskul.delete', ['id'=> $eks->id]) }}" onsubmit="return confirm('Yakin ingin hapus ekstrakurikuler {{ $eks->nama }}???')" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger fs-4 rounded-circle"><i class="fa-solid fa-trash"></i></button>
                </form> --}}
                {{-- <a href="#" class="btn btn-danger delete rounded-circle" data-id="{{ $eks->id }}"
                            data-judul="{{ $eks->nama_kategori_ekskul }}"><i class="fa-solid fa-trash"></i></a>
                    </span>
                </span> --}}
                <span class="position-absolute top-0 start-100 translate-middle pe-5 rounded-circle d-flex">
                    <span class="badge">
                        <a href="{{ route('kategoriekskul.edit', ['id' => $eks->id]) }}"
                            class="btn btn-warning rounded-circle text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                    <span class="badge">
                        <a href="#" class="btn btn-danger delete rounded-circle" data-id="{{ $eks->id }}"
                            data-judul="{{ $eks->nama_kategori_ekskul }}"><i class="fa-solid fa-trash"></i></a>
                    </span>
                    {{-- </span>
                <span class="position-absolute top-0 start-100 translate-middle rounded-circle"> --}}

                </span>
            </div>
        @endforeach

    </div>
@endsection
