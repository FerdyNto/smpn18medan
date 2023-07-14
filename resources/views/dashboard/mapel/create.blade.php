@extends('dashboard.layouts.main')

@section('content')
    {{-- @dd($kelas) --}}
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('mapel.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Mata Pelajaran</h2>

    <form action="{{ route('mapel.store') }}" method="POST" class="col-11">
        @csrf
        <div class="mb-3">
            <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="{{ old('nama_mapel') }}" />
        </div>


        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Tambah">
        </div>
    </form>
@endsection
