@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('komunitas.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Komunitas Baru</h2>

    <form action="{{ route('komunitas.store') }}" method="POST" enctype="multipart/form-data" class="col-11">
        @csrf
        <div class="mb-3">
            <label for="nama_komunitas" class="form-label">Nama Komunitas</label>
            <input type="text" class="form-control" id="nama_komunitas" name="nama_komunitas"
                value="{{ old('nama_komunitas') }}" onkeyup="createTextSlug()" />
        </div>
        <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" />

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Komunitas</label>
            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="link_daftar" class="form-label">Link Pendaftaran (Google Form)</label>
            <input type="text" class="form-control" id="link_daftar" name="link_daftar"
                value="{{ old('link_daftar') }}" />
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" value="{{ old('gambar') }}">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Tambah">
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>

    <script>
        function createTextSlug() {
            var nama = document.getElementById("nama_komunitas").value;
            document.getElementById("slug").value = generateSlug(nama);
        }

        function generateSlug(text) {
            return text.toString().toLowerCase()
                .replace(/^-+/, '')
                .replace(/-+$/, '')
                .replace(/\s+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/[^\w\-]+/g, '');
        }
    </script>
@endsection
