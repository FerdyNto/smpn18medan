@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('jasa.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Data Jasa Baru</h2>

    <form action="{{ route('jasa.store') }}" method="POST" enctype="multipart/form-data" class="col-11">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jasa</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}"
                onkeyup="createTextSlug()" />
        </div>
        <div class="mb-3">
            {{-- <label for="slug" class="form-label">Slug</label> --}}
            <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" />
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Jasa</label>
            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="Jasa" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" id="kontak" name="kontak" value="{{ old('kontak') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <input type="text" id="pesan" name="pesan" value="{{ old('pesan') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga') }}">
            </div>
        </div>


        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" value="{{ old('gambar') }}">
        </div>

        {{-- <div class="mb-3">
            <label for="id_user" class="form-label">User</label>
            <input type="text" class="form-control" id="id_user" value="{{ Auth::user()->nama_user }}" disabled
                readonly />
        </div> --}}

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Tambah Jasa">
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>

    <script>
        function createTextSlug() {
            var nama = document.getElementById("nama").value;
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
