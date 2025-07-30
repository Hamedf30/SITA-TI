@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="card card-outline card-gray shadow">
      <div class="card-header text-center bg-gradient-gray text-white">
        <a href="" class="h1 font-weight-bold d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/dist/img/pnp.png') }}" alt="Logo" style="height: 60px; margin-right: 10px;">
            <b>SITA</b>TI
        </a>
    </div>
        <div class="card-body">
            <p class="login-box-msg font-weight-bold">Masuk untuk memulai sesi Anda</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div class="form-group">
                    <div class="input-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text bg-gray text-white">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <div class="input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Masukkan password" autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text bg-gray text-white">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="form-group">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="text-muted">Ingat Saya</label>
                    </div>
                </div>

                <!-- Sign In Button -->
                <div class="row">
                    <div class="col-8">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-muted">Saya lupa password saya</a>
                        @endif
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                </div>
            </form>

            <!-- Register Link -->
            <p class="mb-0 text-center mt-3">
                <a href="/register" class="text-center text-primary">Daftar untuk membuat akun</a>
            </p>
        </div>
    </div>
</div>

<!-- /.login-box -->
@endsection
