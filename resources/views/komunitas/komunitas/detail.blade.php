@extends('layouts.main')

@section('content')
    <section id="komunitas" class="py-5 my-3">
        <div class="container">
            <!-- breadcrumb -->
            <div class="container-breadcrumb">
                <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('komunitas') }}">Komunitas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $kom->nama_komunitas }}</li>
                    </ol>
                </nav>
            </div>
            <!-- akhir breadcrumb -->
            <div class="d-flex flex-wrap justify-content-lg-between mb-5">
                <div class="header-berita mb-3 col-lg-5">
                    {{-- @dd($kom) --}}
                    <img src="{{ asset('img/komunitas') . '/' . $kom->gambar }}" class="img-fluid img-prestasi"
                        alt="{{ $kom->nama_komunitas }}" />

                </div>
                <div class="col-lg-6">
                    <h2 class="fs-2 mb-3">{{ $kom->nama_komunitas }}</h2>

                    {{-- <p class="fs-6"><span><i class="fa-regular fa-circle-user"></i></span> {{ $sarpras->user->nama_user }}</p> --}}

                    <div class="border-bottom border-warning-subtle border-3 mb-3"></div>

                    <div class="paragraf">
                        {!! $kom->deskripsi !!}
                    </div>

                    <a href="{{ $kom->link_daftar }}" target="_blank" class="btn btn-success mt-3">Link Pendaftaran</a>
                </div>
            </div>

            <div class="col-10 mx-auto my-5">
                <h3 class="text-center">Nama-nama Anggota Komunitas</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($anggota as $a)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $a->nama_anggota }}</td>
                                <td>{{ $a->jabatan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
