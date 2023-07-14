@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Data Siswa</h2>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary fs-5"><span><i
                    class="fa-regular fa-square-plus"></i></span> Tambah Siswa</a>
    </div>

    <form action="{{ route('siswa.index') }}" method="GET" class="col-lg-4">
        <div class="input-group mb-3">
            <select name="kelas" id="kelas" class="me-2 form-select">
                <option value="">Semua Kelas</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama_kelas }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa"
                value="{{ old('nama_siswa') }}">
            <button class="btn btn-cari" type="submit" id="cari">Cari</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($siswa as $s)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->nama_siswa }}</td>
                        <td>{{ $s->kelas->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('siswa.edit', ['id' => $s->id]) }}" class="btn btn-warning text-white"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            {{-- <form action="{{ route('siswa.delete', ['id' => $s->id]) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin hapus data {{ $s->nama_siswa }} ???')"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form> --}}
                            <a href="#" class="btn btn-danger delete" data-id="{{ $s->id }}"
                                data-judul="{{ $s->nama_siswa }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $siswa->links() }}
@endsection
