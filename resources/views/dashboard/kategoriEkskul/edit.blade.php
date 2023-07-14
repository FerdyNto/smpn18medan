@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('kategoriekskul.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Edit Kategori Ekskul</h2>

    <form action="{{ route('kategoriekskul.update', ['id' => $kat_eks->id]) }}" method="POST" class="col-11"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_kategori_ekskul" class="form-label">Nama Kategori Ekskul</label>
            <input type="text" class="form-control" id="nama_kategori_ekskul" name="nama_kategori_ekskul"
                value="{{ $kat_eks->nama_kategori_ekskul }}" />
        </div>

        @if ($kat_eks->gambar)
            <div class="mb-3">
                <img src="{{ url('img/ekskul') . '/' . $kat_eks->gambar }}" alt="{{ $kat_eks->nama_kategori_ekskul }}"
                    style="max-width:200px">
            </div>
        @endif
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" value="{{ old('gambar') }}">
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Ubah">
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('isi_berita');
    </script>
@endsection
