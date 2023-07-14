@extends('dashboard.layouts.main')

@section('content')
    {{-- @dd($kelas) --}}
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('siswa.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Edit Siswa</h2>

    <form action="{{ route('siswa.update', ['id' => $siswa->id]) }}" method="POST" class="col-11">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" />
        </div>
        <div class="mb-3">
            <label for="id_kelas" class="form-label">Kelas</label>
            <select class="form-select" aria-label="kelas" id="id_kelas" name="id_kelas">
                <option>-- Pilih Kelas --</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}" @if ($siswa->id_kelas === $item->id) selected @endif>
                        {{ $item->nama_kelas }}</option>
                @endforeach

            </select>
        </div>


        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Ubah">
        </div>
    </form>
@endsection
