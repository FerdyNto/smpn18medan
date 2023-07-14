@extends('dashboard.layouts.main')
@section('content')
  <div class="d-flex justify-content-between my-3">
    <h2 class="fs-2 m-0">Data Kontak</h2>
    <a href="{{ route('kontak.edit', ['id'=>$kontak->id]) }}" class="btn btn-primary fs-5"><span><i class="fa-regular fa-square-plus"></i></span> Ubah Kontak</a>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kontak</th>
          {{-- <th scope="col" colspan="3">Aksi</th> --}}
        </tr>
      </thead>
      <tbody>
        <tr>
            <td><i class="fa-solid fa-envelope"></i></td>
            <td>{{ $kontak->email }}</td>
        </tr>
        <tr>
            <td><i class="fa-solid fa-location-dot"></i></td>
            <td>{{ $kontak->alamat }}</td>
        </tr>
        <tr>
            <td><i class="fa-solid fa-phone"></i></td>
            <td>{{ $kontak->telp }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  @endsection
