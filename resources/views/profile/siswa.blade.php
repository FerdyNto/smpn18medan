@extends('layouts.main')

@section('content')
    <section id="semua-prestasi">
        <div class="container">
            <!-- breadcrumb -->
            <div class="container-breadcrumb">
                <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                    </ol>
                </nav>
            </div>
            <!-- akhir breadcrumb -->

            <h2 class="text-center mb-5">Daftar Siswa SMP N 18 Medan</h2>


            <div class="row mb-3 d-flex justify-content-center">
                <div class="col-10">
                    <form action="{{ route('siswa') }}" method="GET">
                        <div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari Siswa" name="cari">
                                <select class="form-select" aria-label="Default select" name="kelas">
                                    <option value="" selected>Kelas</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-cari" type="submit" id="cari">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-10 mx-auto my-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->kelas->nama_kelas }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $siswa->links() }}
        </div>
    </section>
@endsection
