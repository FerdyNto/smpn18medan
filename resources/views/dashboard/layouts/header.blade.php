<header class="sticky-top flex-md-nowrap p-0 shadow">
    <nav class="navbar bg-secondary">
        <div class="container-fluid">
            <h1 class="fs-1 fw-semibold text-white">SMP Negri 18 Medan <span class="fs-4 fw-normal">dashboard</span></h1>
            <div class="d-flex align-items-center">
                @auth
                <p class="mb-0 me-3 text-white">{{ Auth::user()->nama_user }} ({{ Auth::user()->lvl  }})</p>
                {{-- <a class="btn btn-danger" href="/logout" role="button">Keluar</a> --}}

                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Keluar</button>
                  </form>

                @else
                <a class="btn btn-primary" href="/sesi" role="button">Login</a>
                @endauth
            </div>
        </div>
    </nav>
</header>