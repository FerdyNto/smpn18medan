@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex">
            <a href="{{ route('prestasi.index') }}" class="btn btn-secondary text-white me-3">Kembali</a>
            <a href="{{ route('prestasi.edit', ['slug' => $prestasi->slug]) }}" class="btn btn-warning text-white me-3">Edit</a>
            <form action="{{ route('prestasi.delete', ['slug' => $prestasi->slug]) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus berita???')" class="d-inline me-3">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
        </div>
        <img src="{{ url('img/prestasi').'/'.$prestasi->gambar }}" alt="{{ $prestasi->judul }}" class="img-fluid img-detail-b">

        <h1>{{ $prestasi->judul }}</h1>

        <p class="m-0 fs-5 text-dark-emphasis"><span class="fs-4"><i class="bi bi-person-circle"></i></span> {{ $prestasi->anggota }} - <span>{{ $prestasi->created_at->format('d F Y') }}</span></p>
        <div class="border-bottom mb-3"></div>

        {!! $prestasi->deskripsi !!}
    </div>
@endsection