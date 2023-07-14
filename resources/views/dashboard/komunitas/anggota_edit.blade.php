@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('komunitas.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Edit Data Anggota</h2>

    <form action="{{ route('komunitas.anggota.update', ['id' => $anggota->id]) }}" method="POST" class="col-11">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_anggota" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota"
                value="{{ $anggota->nama_anggota }}" />
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $anggota->jabatan }}" />
        </div>

        <div class="mb-3">
            <label for="komunitas" class="form-label">Komunitas</label>
            <select class="form-select" aria-label="komunitas" name="komunitas">
                <option>-- Pilih Komunitas --</option>

                @foreach ($komunitas as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $anggota->id_komunitas) selected @endif>
                        {{ $item->nama_komunitas }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Ubah">
        </div>
    </form>
@endsection
