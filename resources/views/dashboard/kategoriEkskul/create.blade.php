@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('kategoriekskul.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Kategori Ekskul Baru</h2>

    <form action="{{ route('kategoriekskul.store') }}" method="POST" class="col-11" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_kategori_ekskul" class="form-label">Nama Kategori Ekskul</label>
            <input type="text" class="form-control" id="nama_kategori_ekskul" name="nama_kategori_ekskul"
                value="{{ old('nama_kategori_ekskul') }}" />
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" value="{{ old('gambar') }}">
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Tambah">
        </div>
    </form>
@endsection
