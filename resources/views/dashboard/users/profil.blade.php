@extends('dashboard.layouts.main')
@section('content')
    <h2 class="fs-2 m-0">Data Editor</h2>
    <div class="d-flex justify-content-between mt-5">
        <div class="col-sm-3">
            @if (!Auth::user()->gambar)
                <img src="{{ asset('img/foto profil.jpg') }}" alt="{{ Auth::user()->nama_user }}"
                    class="img-thumbnail rounded-circle" style="width:100%">
            @else
                <img src="{{ asset('img/user') . '/' . Auth::user()->gambar }}" alt="{{ Auth::user()->nama_user }}"
                    class="img-thumbnail rounded-circle" style="width:100%">
            @endif
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('foto.profil.edit', ['username' => Auth::user()->username]) }}">
                        <span class="me-2"><i class="fa-solid fa-image"></i></span> Ubah Foto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ubah.password') }}">
                        <span class="me-2"><i class="fa-solid fa-clipboard-user"></i></span> Ubah Password
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-sm-1"></div>
        <div class="col-sm-8">
            <form action="{{ route('user.profil.update', ['username' => Auth::user()->username]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama</label>
                    <input type="text" id="nama_user" name="nama_user" class="form-control"
                        value="{{ Auth::user()->nama_user }}">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control"
                        value="{{ Auth::user()->username }}">
                </div>
                <div class="mb-3 d-grid">
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>

    </div>
@endsection
