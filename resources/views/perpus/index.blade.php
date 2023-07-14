@extends('layouts.main')

@section('content')
    <section id="semua-prestasi">
        <div class="container">
            <!-- breadcrumb -->
            <div class="container-breadcrumb">
                <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perpustakaan</li>
                    </ol>
                </nav>
            </div>
            <!-- akhir breadcrumb -->

            <h2 class="text-center mb-5">Daftar Modul Belajar SMP N 18 Medan</h2>


            <div class="col-12 d-flex flex-column-reverse flex-lg-row justify-content-lg-between">
                <!-- navigasi -->
                <div class="col-12 col-lg-3 my-5">
                    <div class="row mb-3">
                        <form action="{{ route('perpustakaan') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari" name="cari">
                                <button class="btn btn-cari" type="submit" id="cari">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <h4>Berita / Info Terbaru</h4>
                        <div class="border-bottom mb-3"></div>
                        <ul class="nav flex-column">
                            @foreach ($berita as $item)
                                @if ($item->kategori->nama_kategori == 'Berita')
                                    <li class="nav-item">
                                        <a class="nav-link text-dark"
                                            href="{{ route('berita.detail', ['slug' => $item->slug]) }}">{{ $item->judul }}</a>
                                    </li>
                                @elseif($item->kategori->nama_kategori == 'Info')
                                    <li class="nav-item">
                                        <a class="nav-link text-dark"
                                            href="{{ route('info.detail', ['slug' => $item->slug]) }}">{{ $item->judul }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- akhir navigasi -->
                {{-- <div class="col-lg-1"></div> --}}
                <!-- Modul -->
                <div class="col-12 col-lg-8 my-5">
                    <table class="table table-striped col-12">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Buku / Modul</th>
                                <th>Kelas</th>
                                {{-- <th>Link</th> --}}
                                <th>Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            ?>
                            @foreach ($perpus as $p)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><a href="{{ $p->link }}" target="_blank">{{ $p->nama_buku }}</a></td>
                                    <td>{{ $p->kelas->nama_kelas }}</td>
                                    {{-- <td><a href="{{ $p->link }}" target="_blank">{{ $p->link }}</a> </td> --}}
                                    <td>{{ $p->mapel->nama_mapel }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- akhir Modul -->
            </div>
            {{ $perpus->links() }}
        </div>
    </section>
@endsection
