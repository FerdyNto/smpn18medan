@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('komunitas.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Pendaftaran Anggota Baru</h2>

    <form action="{{ route('komunitas.anggota.store') }}" method="POST" class="col-11">
        @csrf
        <div class="mb-3">
            <label for="nama_anggota" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota"
                value="{{ old('nama_anggota') }}" />
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" />
        </div>

        <div class="mb-3">
            <label for="komunitas" class="form-label">Komunitas</label>
            <select class="form-select" aria-label="komunitas" name="komunitas">
                <option>-- Pilih Komunitas --</option>

                @foreach ($komunitas as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama_komunitas }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Tambah">
        </div>
    </form>
@endsection
