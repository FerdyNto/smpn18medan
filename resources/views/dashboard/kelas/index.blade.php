@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Data Kelas</h2>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Kelas Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($kelas as $k)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('kelas.edit', ['id' => $k->id]) }}" class="btn btn-warning text-white"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            {{-- <form action="{{ route('kelas.delete', ['id' => $k->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus  {{  $k->nama_kelas }} ???')" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                  </form> --}}
                            <a href="#" class="btn btn-danger delete" data-id="{{ $k->id }}"
                                data-judul="{{ $k->nama_kelas }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
