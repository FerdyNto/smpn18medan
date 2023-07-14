@extends('dashboard.layouts.main')
@section('content')
  
  <form action="{{ route('profile.sekapursirih.update', ['id'=>$sekapursirih->id]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    {{-- @dd($visi_misi) --}}

    
    <div class="mb-3">
      <label for="sekapursirih" class="form-label"><h2>Sekapur Sirih</h2></label>
      <textarea class="form-control" id="sekapursirih" rows="3" name="sekapursirih">{{ $sekapursirih->sekapursirih }}</textarea>
    </div>

    <div class="mb-3">
        <label for="nama_kepsek" class="form-label">Nama Kepala Sekolah</label>
        <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek" value="{{ $sekapursirih->nama_kepsek }}"/>
    </div>
    @if ($sekapursirih->gambar_kepsek)
    <div class="mb-3">
        <img src="{{ url('img/kepsek').'/'.$sekapursirih->gambar_kepsek }}" alt="sekapur sirih" style="max-width:200px">
    </div>
    @endif
    <div class="mb-3">
        <label for="gambar_kepsek" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar_kepsek" name="gambar_kepsek" value="{{ old('gambar_kepsek') }}">
    </div>
    <div class="mb-3 d-grid">
      <button type="submit" class="btn btn-primary">Update Sekapur Sirih</button>
    </div>
  </form>
  
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('sekapursirih');
      </script>
  @endsection
