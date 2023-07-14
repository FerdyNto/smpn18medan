@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-4 border rounded p-3 border-1 mx-auto">
            <h1>Register</h1>
            <form action="{{ route('register.proses') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama</label>
                    <input type="text" id="nama_user" name="nama_user" class="form-control"
                        value="{{ old('nama_user') }}">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Konfirmasi Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" value="{{ old('gambar') }}">
                </div>
                <div class="mb-3">
                    <label for="lvl" class="form-label">Level</label>
                    <input type="text" id="lvl" name="lvl" class="form-control" value="author" readonly>
                </div>
                <div class="mb-3 d-grid">
                    <button class="btn btn-primary" name="register" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
