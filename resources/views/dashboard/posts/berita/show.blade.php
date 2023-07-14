@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex mt-3 position-fixed">
            <a href="{{ route('berita.index') }}" class="btn btn-secondary text-white me-3">Kembali</a>
            <a href="{{ route('berita.edit', ['slug' => $berita->slug]) }}" class="btn btn-warning text-white me-3">Edit</a>
            <form action="{{ route('berita.delete', ['slug'=> $berita->slug]) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus berita???')" class="d-inline me-3">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
        </div>
        <img src="{{ url('img/berita').'/'.$berita->gambar }}" alt="{{ $berita->judul }}" class="img-fluid img-detail-b">

        <h1>{{ $berita->judul }}</h1>

        <p class="m-0 fs-5 text-dark-emphasis"><span class="fs-4"><i class="bi bi-person-circle"></i></span> {{ $berita->user->nama_user }} - <span>{{ $berita->created_at->format('d F Y') }}</span></p>
        <div class="border-bottom mb-3"></div>

        {!! $berita->isi_berita !!}
    </div>
@endsection