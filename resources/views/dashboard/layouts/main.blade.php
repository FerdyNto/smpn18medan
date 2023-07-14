<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - SMP N 18 Medan</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- <script src="../js/dashboard.js"></script> -->


    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- sweet alert --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <style>
        .img-ds {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
        }
    </style>
</head>

<body>
    @if (Auth::check())
        @include('dashboard.layouts.header')
    @endif

    <div class="container-fluid">
        <div class="row">
            @if (Auth::check())
                @include('dashboard.layouts.sideNav')
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @endif

            @yield('content')


            @if (Auth::check())
                </main>
            @endif

        </div>
    </div>

    @include('sweetalert::alert')
    @include('dashboard.components.pesan')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>

    {{-- Sweet Alert --}}
    {{-- <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script> --}}
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



</body>

</html>
