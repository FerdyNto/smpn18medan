@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Data Guru</h2>
        <a href="{{ route('profile.guru.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Data Guru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Mapel</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($guru as $g)
                    <tr>
                        <td class="p2">{{ $no++ }}</td>
                        <td class="p2">
                            @if ($g->foto)
                                <img src="{{ url('img/guru') . '/' . $g->foto }}" alt="{{ $g->nama }}"
                                    style="aspect-ratio: 3/4; object-fit: cover; width: 100px;">
                            @endif
                        </td>
                        <td class="p2">{{ $g->nama }}</td>
                        <td class="p2">{{ date('d-m-Y', strtotime($g->tgl_lahir)) }}</td>
                        <td class="p2">{{ $g->mapel }}</td>
                        {{-- <td class="p-2">
                    <a href="" class="btn btn-info text-white"><i class="fa-regular fa-eye"></i></a>
                </td> --}}
                        <td class="p-2">
                            <a href="{{ route('profile.guru.edit', ['id' => $g->id]) }}"
                                class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td class="p-2">
                            {{-- <form action="{{ route('profile.guru.delete', ['id' => $g->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data guru {{ $g->nama }}???')" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form> --}}
                            <a href="#" class="btn btn-danger delete" data-id="{{ $g->id }}"
                                data-judul="{{ $g->nama }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $guru->links() }}
    </div>
@endsection
