@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Data Staff</h2>
        <a href="{{ route('profile.staff.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Data Staff</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col" colspan="3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($staff as $s)
                    <tr>
                        <td class="p2">{{ $no++ }}</td>
                        <td class="p2">
                            @if ($s->foto)
                                <img src="{{ url('img/staff') . '/' . $s->foto }}" alt="{{ $s->nama }}"
                                    style="aspect-ratio: 3/4; object-fit: cover; width: 100px;">
                            @endif
                        </td>
                        <td class="p2">{{ $s->nama }}</td>
                        <td class="p2">{{ date('d-m-Y', strtotime($s->tgl_lahir)) }}</td>
                        <td class="p2">{{ $s->jabatan }}</td>
                        {{-- <td class="p-2">
                    <a href="" class="btn btn-info text-white"><i class="fa-regular fa-eye"></i></a>
                </td> --}}
                        <td class="p-2">
                            <a href="{{ route('profile.staff.edit', ['id' => $s->id]) }}"
                                class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td class="p-2">
                            {{-- <form action="{{ route('profile.staff.delete', ['id' => $s->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus staff {{ $s->nama }}???')" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form> --}}
                            <a href="#" class="btn btn-danger delete" data-id="{{ $s->id }}"
                                data-judul="{{ $s->nama }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $staff->links() }}
    </div>
@endsection
