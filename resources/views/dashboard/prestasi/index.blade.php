@extends('dashboard.layouts.main')
@section('content')
    {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Dashboard</h1>
    
  </div> --}}
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Prestasi</h2>
        <a href="{{ route('prestasi.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Prestasi</a>
    </div>

    <form action="{{ route('prestasi.index') }}" method="GET" class="col-lg-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari" name="prestasi">
            <button class="btn btn-cari" type="submit" id="cari">Cari</button>
        </div>
    </form>

    @if ($prestasi->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col" class="col-1">Judul</th>
                        <th scope="col" class="col-5">Deskripsi</th>
                        <th scope="col">Anggota</th>
                        <th scope="col" class="text-nowrap">Tanggal Posting</th>
                        <th scope="col" colspan="3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    @foreach ($prestasi as $p)
                        <tr>
                            <td class="p-2">{{ $no++ }}</td>
                            <td class="p-2">
                                @if ($p->gambar)
                                    <img src="{{ url('img/prestasi') . '/' . $p->gambar }}" alt="{{ $p->judul }}"
                                        class="img-ds">
                                @endif
                            </td>
                            <td class="p-2">{{ $p->judul }}</td>
                            <td class="p-2">{!! Str::substr($p->deskripsi, 0, 200) !!}</td>
                            <td class="p-2">{{ $p->anggota }}</td>
                            <td class="p-2">{{ $p->created_at->format('d F Y') }}</td>
                            <td class="p-2">
                                <a href="{{ route('prestasi.show', ['slug' => $p->slug]) }}"
                                    class="btn btn-info text-white"><i class="fa-regular fa-eye"></i></a>
                            </td>
                            <td class="p-2">
                                <a href="{{ route('prestasi.edit', ['slug' => $p->slug]) }}"
                                    class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td class="p-2">
                                {{-- <form action="{{ route('prestasi.delete', ['slug' => $p->slug]) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin hapus prestasi dengan judul {{ $p->judul }}???')"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form> --}}
                                <a href="#" class="btn btn-danger delete" data-id="{{ $p->slug }}"
                                    data-judul="{{ $p->judul }}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h2 class="text-center">Tidak ada Prestasi</h2>
    @endif

    {{ $prestasi->links() }}

@endsection
