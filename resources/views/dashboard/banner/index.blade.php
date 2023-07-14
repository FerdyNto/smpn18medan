@extends('dashboard.layouts.main')
@section('content')
  <div class="d-flex justify-content-between my-3">
    <h2 class="fs-2 m-0">Banner Beranda Website</h2>
    <a href="{{ route('hero.image.edit', ['id' => $banner->id]) }}" class="btn btn-primary fs-5"><span><i class="fa-solid fa-pen-to-square"></i></span> Edit Banner</a>
  </div>

  <div class="d-flex flex-wrap justify-content-start gap-5 mt-5">
    <img src="{{ asset('img/banner'). '/'. $banner->banner }}" alt="SMP N 18 Medan" class="img-fluid">
    
  </div>
  @endsection
