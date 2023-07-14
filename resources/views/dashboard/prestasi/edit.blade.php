@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-between my-3">
    <a class="btn btn-secondary" href="{{ route('prestasi.index') }}" role="button">Kembali</a>
</div>
<h2 class="my-5">Form Edit Prestasi</h2>

<form action="{{ route('prestasi.update', ['slug' => $prestasi->slug]) }}" method="POST" enctype="multipart/form-data" class="col-11">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Prestasi</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $prestasi->judul }}" onkeyup="createTextSlug()" />
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ $prestasi->slug }}" />
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ $prestasi->deskripsi }}</textarea>
    </div>
    <div class="mb-3">
        <label for="anggota" class="form-label">Anggota</label>
        <input type="text" class="form-control" id="anggota" name="anggota" value="{{ $prestasi->anggota }}" />
    </div>

    @if ($prestasi->gambar)
    <div class="mb-3">
        <img src="{{ url('img/prestasi').'/'.$prestasi->gambar }}" alt="{{ $prestasi->judul }}" style="max-width:200px">
    </div>
    @endif
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
    </div>

    <div class="mb-3">
        <label for="id_user" class="form-label">User</label>
        <input type="text" class="form-control" id="id_user" value="{{ $prestasi->user->nama_user }}" disabled readonly />
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ $prestasi->user->id }}"  />
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
   CKEDITOR.replace('deskripsi', {
        height: 300,
        filebrowserUploadUrl: "{{route('upload.gambar.prestasi', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script>
    function createTextSlug()
    {
        var judul = document.getElementById("judul").value;
                    document.getElementById("slug").value = generateSlug(judul);
    }
    function generateSlug(text)
    {
        return text.toString().toLowerCase()
            .replace(/^-+/, '')
            .replace(/-+$/, '')
            .replace(/\s+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/[^\w\-]+/g, '');
    }
</script>

@endsection
