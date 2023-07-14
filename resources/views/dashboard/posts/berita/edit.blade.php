@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between my-3">
    <a class="btn btn-secondary" href="{{ route('berita.index') }}" role="button">Kembali</a>
</div>
<h2 class="my-5">Form Edit Berita</h2>
<form action="{{ route('berita.update', ['slug' => $berita->slug]) }}" method="POST" enctype="multipart/form-data" class="col-11">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Berita</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" onkeyup="createTextSlug()" />
    </div>
    <div class="mb-3">
        <label for="isi_berita" class="form-label">Isi Berita</label>
        <textarea class="form-control" id="isi_berita" rows="3" name="isi_berita" required>{{ $berita->isi_berita }}</textarea>
    </div>

    <div class="mb-3">
        <label for="id_kategori" class="form-label">Kategori</label>
        <select class="form-select" aria-label="Kategori" name="id_kategori">
            <option selected>-- Pilih Kategori --</option>

            @foreach ($kategori as $item)
            <option value="{{ $item->id }}" @if ($berita->kategori->id === $item->id) selected @endif>{{ $item->nama_kategori }}</option>
            @endforeach

        </select>
    </div>

    
    @if ($berita->gambar)
    <div class="mb-3">
        <img src="{{ url('img/berita').'/'.$berita->gambar }}" alt="{{ $berita->judul }}" style="max-width:200px">
    </div>
    @endif
    

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar"/>
    </div>

    <div class="mb-3">
        <label for="id_user" class="form-label">User</label>
        <input type="text" class="form-control" id="id_user" value="{{ $berita->user->nama_user }}" disabled readonly/>
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ $berita->user->id }}" />
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi_berita', {
        height: 300,
        filebrowserUploadUrl: "{{route('upload.gambar.berita', ['_token' => csrf_token() ])}}",
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
