@extends('dashboard.layouts.main')

@section('content')


<div class="d-flex justify-content-between my-3">
    <a class="btn btn-secondary" href="{{ route('profile.guru') }}" role="button">Kembali</a>
</div>
<h2 class="my-5">Form Guru Baru</h2>

<form action="{{ route('profile.guru.store') }}" method="POST" enctype="multipart/form-data" class="col-11">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" />
    </div>
    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">tgl_lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" />
    </div>
    <div class="mb-3">
        <label for="mapel" class="form-label">Mapel</label>
        <input type="text" class="form-control" id="mapel" name="mapel" value="{{ old('mapel') }}" />
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}">
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Posting">
    </div>
</form>

@endsection
