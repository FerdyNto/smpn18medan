@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('perpus.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Edit Buku(Modul)</h2>

    <form action="{{ route('perpus.update', ['id' => $perpus->id]) }}" method="POST" class="col-11">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_buku" class="form-label">Nama Buku / Modul</label>
            <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="{{ $perpus->nama_buku }}" />
        </div>
        <div class="mb-3">
            <label for="mapel" class="form-label">Mata Pelajaran</label>
            <select class="form-select" aria-label="Default select" id="mapel" name="mapel">
                <option>-- Mata Pelajaran --</option>
                @foreach ($mapel as $item)
                    <option value="{{ $item->id }}" @if ($item->id === $perpus->id_mapel) selected @endif>
                        {{ $item->nama_mapel }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select class="form-select" aria-label="Default select" id="kelas" name="kelas">
                <option>-- Kelas --</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}" @if ($item->id === $perpus->id_kelas) selected @endif>
                        {{ $item->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link Buku / Modul</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $perpus->link }}" />
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Ubah">
        </div>
    </form>
@endsection
