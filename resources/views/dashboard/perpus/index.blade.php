@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Perpustakaan (Modul Belajar)</h2>
        <a href="{{ route('perpus.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Buku / Modul</a>
    </div>

    <form action="" method="GET" class="col-lg-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari" name="cari">
            <button class="btn btn-cari" type="submit" id="cari">Cari</button>
        </div>
    </form>
    @if ($perpus->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col" class="col-1">Kelas</th>
                        <th scope="col" class="col-2">Mapel</th>
                        <th scope="col" class="col-5">Link</th>
                        <th scope="col" colspan="3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    ?>

                    @foreach ($perpus as $p)
                        <tr>
                            <td class="p-2">{{ $no++ }}</td>

                            <td class="p-2 fw-semibold">{{ $p->nama_buku }}</td>
                            <td class="p-2">{{ $p->kelas->nama_kelas }}</td>
                            <td class="p-2"> {{ $p->mapel->nama_mapel }}</td>
                            <td class="p-2"> {{ $p->link }}</td>
                            <td class="p-2">
                                <a href="{{ route('perpus.edit', ['id' => $p->id]) }}" class="btn btn-warning text-white"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td class="p-2">
                                {{-- <form action="{{ route('perpus.delete', ['id' => $p->id]) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin hapus buku / modul dengan nama {{ $p->nama_buku }} ???')"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form> --}}
                                <a href="#" class="btn btn-danger delete" data-id="{{ $p->id }}"
                                    data-judul="{{ $p->nama_buku }}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @else
        <h2 class="text-center">Tidak ada Data Buku / Modul</h2>
    @endif

    {{-- {{ $berita->links() }} --}}
@endsection
