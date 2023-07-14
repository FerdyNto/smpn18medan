@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('ekskul.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Edit Esktrakurikuler</h2>

    <form action="{{ route('ekskul.update', ['id' => $ekskul->id]) }}" method="POST" enctype="multipart/form-data"
        class="col-11">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Ekstrakurikuler</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $ekskul->nama }}"
                onkeyup="createTextSlug()" />
        </div>
        <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $ekskul->slug }}" />
        <div class="mb-3">
            <label for="kategori_ekskul_id" class="form-label">Kategori Ekstrakurikuler</label>
            <select class="form-select" aria-label="kategori_ekskul_id" name="kategori_ekskul_id">
                <option>-- Pilih Kategori --</option>
                @foreach ($kategori_ekskul as $item)
                    <option value="{{ $item->id }}" @if ($item->id === $ekskul->kategoriekskul->id) selected @endif>
                        {{ $item->nama_kategori_ekskul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Ekstrakurikuler</label>
            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ $ekskul->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="link_daftar" class="form-label">Link Pendaftaran (Google Form)</label>
            <input type="text" class="form-control" id="link_daftar" name="link_daftar"
                value="{{ $ekskul->link_daftar }}" />
        </div>
        <div class="mb-3">
            <label for="pembina" class="form-label">Nama Pembina</label>
            <input type="text" class="form-control" id="pembina" name="pembina" value="{{ $ekskul->pembina }}" />
        </div>

        @if ($ekskul->gambar)
            <div class="mb-3">
                <img src="{{ url('img/ekskul') . '/' . $ekskul->gambar }}" alt="{{ $ekskul->nama }}"
                    style="max-width:200px">
            </div>
        @endif
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Ubah">
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
