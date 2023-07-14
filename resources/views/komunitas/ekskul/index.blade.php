@extends('layouts.main')

@section('content')
    <style>
        .kategori {
            position: relative;
            width: 18rem;
            aspect-ratio: 1/1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
        }

        .img-ekskul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
        }

        .kategori h3 {
            z-index: 1;
            position: absolute;
            color: white;
            font-weight: 600;
            text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7)
        }
    </style>
    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-5">Ekstrakurikuler UPT SMP Negeri 18 Medan</h1>
            <div class="d-flex justify-content-around flex-wrap">
                @foreach ($kat_eks as $item)
                    <a href="{{ route('ekstrakurikuler.detail', ['id' => $item->id]) }}">
                        <div class="kategori">
                            <h3>{{ $item->nama_kategori_ekskul }}</h3>
                            <img src="{{ asset('img/ekskul') . '/' . $item->gambar }}" alt="{{ $item->nama_kategori_ekskul }}"
                                class="img-ekskul img-thumbnail">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>


    </section>
@endsection
