@extends('dashboard.layouts.main')
@section('content')
    <form action="{{ route('profile.visi-misi.update', ['id' => $visi_misi->id]) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- @dd($visi_misi) --}}
        <div class="mb-3">
            <label for="visi" class="form-label">
                <h2>Visi</h2>
            </label>
            <textarea class="form-control" id="visi" rows="3" name="visi">{{ $visi_misi->visi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="misi" class="form-label">
                <h2>Misi</h2>
            </label>
            <textarea class="form-control" id="misi" rows="3" name="misi">{{ $visi_misi->misi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tujuan" class="form-label">
                <h2>Tujuan</h2>
            </label>
            <textarea class="form-control" id="tujuan" rows="3" name="tujuan">{{ $visi_misi->tujuan }}</textarea>
        </div>
        <div class="mb-3 d-grid">
            <button type="submit" class="btn btn-primary">Update Visi, Misi & Tujuan</button>
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('visi');
        CKEDITOR.replace('misi');
        CKEDITOR.replace('tujuan');
    </script>
@endsection
