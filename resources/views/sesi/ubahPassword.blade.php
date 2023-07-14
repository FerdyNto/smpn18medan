@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="col-12 col-lg-4 border rounded p-3 border-1 mx-auto">
    <h1>Ubah Password</h1>
    <form action="{{ route('ubah.password.proses') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="old_password" class="form-label">Password Lama</label>
            <input type="password" id="old_password" name="old_password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru</label>
            <input type="password" id="new_password" name="new_password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button class="btn btn-primary" name="ubah" type="submit">Ubah Password</button>
        </div>
    </form>
  </div>
</div>


@endsection

 


   