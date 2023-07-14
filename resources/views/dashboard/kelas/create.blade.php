@extends('dashboard.layouts.main')

@section('content')


<div class="d-flex justify-content-between my-3">
    <a class="btn btn-secondary" href="{{ route('kelas.index') }}" role="button">Kembali</a>
</div>
<h2 class="my-5">Form Kelas Baru</h2>

<form action="{{ route('kelas.store') }}" method="POST" class="col-11">
    @csrf
    <div class="mb-3">
        <label for="nama_kelas" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}" />
    </div>
   

    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Tambah">
    </div>
</form>

@endsection
