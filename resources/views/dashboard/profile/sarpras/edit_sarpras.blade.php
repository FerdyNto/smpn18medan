@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-between my-3">
    <a class="btn btn-secondary" href="{{ route('profile.sarpras') }}" role="button">Kembali</a>
</div>
<h2 class="my-5">Form Edit Sarana dan Prasarana</h2>

<form action="{{ route('profile.sarpras.update', ['slug'=> $sarpras->slug]) }}" method="POST" enctype="multipart/form-data" class="col-11">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_sarpras" class="form-label">Nama Sarpras</label>
        <input type="text" class="form-control" id="nama_sarpras" name="nama_sarpras" value="{{ $sarpras->nama_sarpras }}" onkeyup="createTextSlug()" />
    </div>
    <div class="mb-3">
        <label for="jenis" class="form-label">Jenis</label>
        <select class="form-select" id="jenis" name="jenis">
            <option>-- Pilih Jenis --</option>
            <option value="sarana" @if ($sarpras->jenis === 'sarana') selected @endif>Sarana</option>
            <option value="prasarana" @if ($sarpras->jenis === 'prasarana') selected @endif>Prasarana</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ $sarpras->deskripsi }}</textarea>
    </div>

    @if ($sarpras->gambar)
    <div class="mb-3">
        <img src="{{ url('img/sarpras').'/'.$sarpras->gambar }}" alt="{{ $sarpras->nama_sarpras }}" style="max-width:400px">
    </div>
    @endif
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
    </div>


    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>

<script>
    function createTextSlug()
    {
        var nama_sarpras = document.getElementById("nama_sarpras").value;
                    document.getElementById("slug").value = generateSlug(nama_sarpras);
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
