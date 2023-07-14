@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Mata Pelajaran</h2>
        <a href="{{ route('mapel.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Mata
            Pelajaran</a>
    </div>

    {{-- <form action="" method="GET" class="col-lg-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari" name="berita">
            <button class="btn btn-cari" type="submit" id="cari">Cari</button>
        </div>
    </form> --}}
    {{-- @if ($berita->count() > 0) --}}
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mata Pelajaran</th>
                    <th scope="col" colspan="3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                ?>

                @foreach ($mapel as $m)
                    <tr>
                        <td class="p-2">{{ $no++ }}</td>
                        <td class="p-2 fw-semibold">{{ $m->nama_mapel }}</td>
                        <td class="p-2">
                            <a href="{{ route('mapel.edit', ['id' => $m->id]) }}" class="btn btn-warning text-white"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td class="p-2">
                            {{-- <form action="{{ route('mapel.delete', ['id' => $m->id]) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin hapus mata pelajaran {{ $m->nama_mapel }} ???')"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form> --}}
                            <a href="#" class="btn btn-danger delete" data-id="{{ $m->id }}"
                                data-judul="{{ $m->nama_mapel }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {{-- @else
        <h2 class="text-center">Tidak ada Berita Sekolah</h2>
    @endif --}}

    {{-- {{ $berita->links() }} --}}
@endsection
