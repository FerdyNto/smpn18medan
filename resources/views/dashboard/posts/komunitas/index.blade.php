@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Berita Komunitas</h2>
        <a href="{{ route('komunitas_posts.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Berita Komunitas</a>
    </div>

    <form action="" method="GET" class="col-lg-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari" name="komunitas">
            <button class="btn btn-cari" type="submit" id="cari">Cari</button>
        </div>
    </form>
    @if ($posts->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col" class="col-1">Judul</th>
                        <th scope="col" class="col-5">Isi Kegiatan</th>
                        {{-- <th scope="col">Kategori</th> --}}
                        <th scope="col" class="text-nowrap col-2">Tanggal Posting</th>
                        <th scope="col">Nama Komunitas</th>
                        <th scope="col" colspan="2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    ?>

                    @foreach ($posts as $b)
                        <tr>
                            <td class="p-2">{{ $no++ }}</td>
                            <td class="p-2">
                                @if ($b->gambar)
                                    <img src="{{ asset('img/komunitas') . '/' . $b->gambar }}" alt="{{ $b->judul }}"
                                        class="img-ds">
                                @endif
                            </td>
                            <td class="p-2 fw-semibold">{{ $b->judul }}</td>
                            <td class="p-2">{!! Str::substr($b->isi_post, 0, 200) !!}</td>
                            {{-- <td class="p-2">{{ $b->kategori->nama_kategori }}</td> --}}
                            <td class="p-2">{{ $b->created_at->format('d F Y') }}</td>
                            <td class="p-2">{{ $b->komunitas->nama_komunitas }}</td>
                            {{-- <td class="p-2">
                        <a href="" class="btn btn-info text-white"><i class="fa-regular fa-eye"></i></a>
                    </td> --}}
                            <td class="p-2">
                                <a href="{{ route('komunitas_posts.edit', ['slug' => $b->slug]) }}"
                                    class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td class="p-2">
                                <a href="#" class="btn btn-danger delete" data-id="{{ $b->slug }}"
                                    data-judul="{{ $b->judul }}"><i class="fa-solid fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @else
        <h2 class="text-center">Tidak ada Berita Komunitas</h2>
    @endif

    {{ $posts->links() }}
@endsection
