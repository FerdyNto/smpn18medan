@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Sarana dan Prasarana</h2>
        <a href="{{ route('profile.sarpras.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Sarana / Prasarana</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col-3">Gambar</th>
                    <th scope="col" class="col-1">Nama Sarpras</th>
                    <th scope="col" class="col-5">Deskripsi</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($sarpras as $sar)
                    <tr>
                        <td class="p-2">{{ $no++ }}</td>
                        <td class="p-2">
                            @if ($sar->gambar)
                                <img src="{{ url('img/sarpras') . '/' . $sar->gambar }}" alt="{{ $sar->nama_sarpras }}"
                                    class="img-ds">
                            @endif
                        </td>
                        <td class="p-2">{{ $sar->nama_sarpras }}</td>
                        <td class="p-2">{!! Str::substr($sar->deskripsi, 0, 200) !!}</td>
                        <td class="p-2">{{ $sar->jenis }}</td>
                        {{-- <td class="p-2">
            <a href="{{ '/dashboard/sarpras/'. $sar->slug }}" class="btn btn-info text-white"><i class="fa-regular fa-eye"></i></a>
          </td> --}}
                        <td class="p-2">
                            <a href="{{ route('profile.sarpras.edit', ['slug' => $sar->slug]) }}"
                                class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td class="p-2">
                            {{-- <form action="{{ route('profile.sarpras.delete', ['slug' => $sar->slug]) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus sarpras {{ $sar->nama_sarpras }} ???')" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
            </form> --}}
                            <a href="#" class="btn btn-danger delete" data-id="{{ $sar->slug }}"
                                data-judul="{{ $sar->nama_sarpras }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $sarpras->links() }}
    </div>
@endsection
