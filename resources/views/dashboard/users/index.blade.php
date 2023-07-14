@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between my-3">
        <h2 class="fs-2 m-0">Data Penanggung Jawab Website</h2>
        <a href="{{ route('register') }}" class="btn btn-primary fs-5"><span><i class="fa-regular fa-square-plus"></i></span>
            Register Penulis</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col-3">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Level</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($users as $user)
                    <tr>
                        <td class="p-2">{{ $no++ }}</td>
                        <td class="p-2">
                            @if (!$user->gambar)
                                <img src="{{ asset('img/foto profil.jpg') }}" alt="{{ $user->nama_user }}"
                                    class="img-thumbnail" width="200px">
                            @else
                                <img src="{{ asset('img/user') . '/' . $user->gambar }}" alt="{{ $user->nama_user }}"
                                    class="img-thumbnail" width="200px">
                            @endif
                        </td>
                        <td class="p-2">{{ $user->nama_user }}</td>
                        <td class="p-2">{{ $user->username }}</td>
                        <td class="p-2">{{ $user->lvl }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
