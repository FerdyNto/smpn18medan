@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Daftar Anggota Komunitas {{ $komunitas->nama_komunitas }}</h2>
        <a href="{{ route('komunitas.anggota.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span>
            Tambah Anggota
            Baru</a>
    </div>

    <a href="{{ route('komunitas.index') }}" class="btn btn-secondary">Kembali</a>

    <form action="" method="GET" class="col-lg-4 mt-3">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari" name="anggota">
            <button class="btn btn-cari" type="submit" id="cari">Cari</button>
        </div>
    </form>
    {{-- @if ($berita->count() > 0) --}}
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                ?>

                @foreach ($anggota as $a)
                    <tr>
                        <td class="p-2">{{ $no++ }}</td>
                        <td class="p-2 fw-semibold">{{ $a->nama_anggota }}</td>
                        <td class="p-2">{{ $a->jabatan }}</td>
                        <td class="p-2">
                            <a href="{{ route('komunitas.anggota.edit', ['id' => $a->id]) }}"
                                class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td class="p-2">
                            {{-- <a href="#" class="btn btn-danger delete-anggota" data-id="{{ $a->id }}"
                                data-judul="{{ $a->nama_anggota }}" data-komunitas="{{ $komunitas->id }}"><i
                                    class="fa-solid fa-trash"></i></a> --}}
                            <form action="{{ route('komunitas.anggota.delete', ['id' => $a->id]) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin hapus keanggotaan {{ $a->nama_anggota }} ???')"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>

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
    <script>
        $('.delete-anggota').click(function() {

            var slug = $(this).attr('data-id');
            var judul = $(this).attr('data-judul');
            var kom = $(this).attr('data-komunitas');
            Swal.fire({
                title: 'Hapus {!! $active !!}!',
                text: "Yakin ingin hapus keanggotaan " + judul + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "anggota/" + slug + ""
                }
            })
        });
    </script>
@endsection
