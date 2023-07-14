@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Data Kewirausahaan (Produk)</h2>
        <a href="{{ route('produk.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Produk Baru</a>
    </div>

    <form action="" method="GET" class="col-lg-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Produk" name="produk" value="{{ old('produk') }}">
            <button class="btn btn-cari" type="submit" id="cari">Cari</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col-2">Foto Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Deskrpisi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kontak (WA)</th>
                    <th scope="col">Isi Pesan</th>
                    <th scope="col" colspan="2">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($usaha as $u)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('img/produk') . '/' . $u->gambar }}" alt="{{ $u->nama }}"
                                class="img-ds"></td>
                        <td>{{ $u->nama }}</td>
                        <td>{!! $u->deskripsi !!}</td>
                        <td>Rp. {{ $u->harga }}</td>
                        <td>{{ $u->kontak }}</td>
                        <td>{{ $u->pesan }}</td>
                        <td>{{ $u->kategori }}</td>
                        <td>
                            <a href="{{ route('produk.edit', ['slug' => $u->slug]) }}"
                                class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            {{-- <form action="{{ route('produk.delete', ['slug' => $u->slug]) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin hapus data  ???')" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form> --}}
                            <a href="#" class="btn btn-danger delete" data-id="{{ $u->slug }}"
                                data-judul="{{ $u->nama }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{ $usaha->links() }}
@endsection
