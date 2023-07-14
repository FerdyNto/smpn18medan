@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('berita.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Ubah Gambar Banner</h2>
    <form action="{{ route('hero.image.update', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data"
        class="col-11">
        @csrf
        @method('PUT')
        @if ($banner->banner)
            <div class="mb-3">
                <img src="{{ asset('img/banner') . '/' . $banner->banner }}" alt="SMP N 18 Medan" style="max-width:200px">
            </div>
        @endif
        <div class="mb-3">
            <label for="banner" class="form-label">Banner</label>
            <input type="file" class="form-control" id="banner" name="banner" />
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Ubah Gambar">
        </div>
    </form>
@endsection
