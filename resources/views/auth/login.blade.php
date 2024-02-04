@extends('layouts.auth')

@section('content')

    <div class="login-box mt-2" style="color: #000 !important">
        <div class="login-logo">
            <img src="{{ asset('image/logo.jpg') }}" alt="Logo Desa" class="img-fluid" width="200" height="200">
            <br>
            <a href="{{ url('/') }}" class="font-weight-bold text-black">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg font-weight-bold">LOGIN PAGE</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email Address" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            @if (Route::has('register'))
                                <p class="mb-0">
                                    <a href="{{ route('register') }}" class="text-center">Tambahkan Akun Baru?</a>
                                </p>
                            @endif
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
        <div class="card mt-4">
            <div class="card-body row">
                Email : admin@test.com
                Password : password
                <br>
                Email : staff@test.com
                Password : password
                <br>
                Email : user@test.com
                Password : password
            </div>
        </div>
    </div>
    <!-- /.login-box -->

@endsection
