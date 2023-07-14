@extends('layouts.main')

@section('content')
    <section id="semua-prestasi">
        <div class="container">
            <!-- breadcrumb -->
            <div class="container-breadcrumb">
                <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Visi, Misi & Tujuan</li>
                    </ol>
                </nav>
            </div>
            <!-- akhir breadcrumb -->

            <h2>Visi</h2>
            {!! $visi_misi->visi !!}

            <h2>Misi</h2>
            {!! $visi_misi->misi !!}

            <h2>Tujuan</h2>
            {!! $visi_misi->tujuan !!}
        </div>
    </section>
@endsection
