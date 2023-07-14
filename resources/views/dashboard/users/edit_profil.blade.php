@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('user.profil', ['username' => Auth::user()->username]) }}"
            role="button">Kembali</a>
    </div>
    <h2 class="my-5">Ubah Foto Profil</h2>
    <form action="{{ route('foto.profil.update', ['username' => Auth::user()->username]) }}" method="POST"
        enctype="multipart/form-data" class="col-11">
        @csrf
        @method('PUT')
        <div class="mb-3">
            @if ($user->gambar)
                <img src="{{ asset('img/user') . '/' . $user->gambar }}" alt="{{ $user->nama_user }}"
                    style="max-width:200px" class="img-thumbnail rounded-circle">
            @else
                <img src="{{ asset('img/foto profil.jpg') }}" alt="{{ $user->nama_user }}" style="max-width:200px"
                    class="img-thumbnail rounded-circle">
            @endif
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Foto</label>
            <input type="file" class="form-control" id="gambar" name="gambar" />
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Ubah Gambar">
        </div>
    </form>
@endsection
