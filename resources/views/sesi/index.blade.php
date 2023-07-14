@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="col-12 col-lg-4 border rounded p-3 border-1 mx-auto">
    <h1>Login</h1>
    <form action="{{ route('login.proses') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button class="btn btn-primary" name="login" type="submit">Login</button>
        </div>
    </form>
  </div>
</div>


@endsection