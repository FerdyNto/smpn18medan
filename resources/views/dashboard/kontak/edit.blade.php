@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between my-3">
    <a class="btn btn-secondary" href="{{ route('kontak.index') }}" role="button">Kembali</a>
</div>
<h2 class="my-5">Form Edit Kontak</h2>
<form action="{{ route('kontak.update', ['id'=>$kontak->id]) }}" method="POST" class="col-11">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $kontak->email }}" />
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $kontak->alamat }}" />
    </div>
    <div class="mb-3">
        <label for="telp" class="form-label">Telp</label>
        <input type="text" class="form-control" id="telp" name="telp" value="{{ $kontak->telp }}" />
    </div>
   
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</form>


@endsection
