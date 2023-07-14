@extends('dashboard.layouts.main')

@section('content')


<div class="d-flex justify-content-between my-3">
    <a class="btn btn-secondary" href="{{ route('profile.guru') }}" role="button">Kembali</a>
</div>
<h2 class="my-5">Form Edit Guru</h2>

<form action="{{ route('profile.guru.update', ['id' => $guru->id]) }}" method="POST" enctype="multipart/form-data" class="col-11">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" />
    </div>
    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">tgl_lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $guru->tgl_lahir }}" />
    </div>
    <div class="mb-3">
        <label for="mapel" class="form-label">Mapel</label>
        <input type="text" class="form-control" id="mapel" name="mapel" value="{{ $guru->mapel }}" />
    </div>

    @if ($guru->foto)
    <div class="mb-3">
        <img src="{{ url('img/guru').'/'.$guru->foto }}" alt="{{ $guru->nama }}" style="aspect-ratio: 3/4; object-fit: cover; width: 100px;">
    </div>
    @endif
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Posting">
    </div>
</form>


@endsection
