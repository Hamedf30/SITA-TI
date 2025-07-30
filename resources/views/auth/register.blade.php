@extends('layouts.auth')

@section('content')
<div class="register-box">
    <div class="card card-outline card-gray shadow">
        <div class="card-header text-center bg-gradient-gray text-white">
            <a href="" class="h1 font-weight-bold d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/dist/img/pnp.png') }}" alt="Logo" style="height: 60px; margin-right: 10px;">
                <b>SITA</b>PNP
            </a>
        </div>
        
        <div class="card-body">
            <p class="login-box-msg font-weight-bold">Daftar untuk membuat akun</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Input -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text bg-gray text-white">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="form-group">
                    <div class="input-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email" name="email" value="{{ old('email') }}" required autocomplete="email">
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

                <!-- Role Selection -->
                <div class="form-group">
                    <select id="roles" class="form-control @error('roles') is-invalid @enderror" name="roles" required>
                        <option value="" disabled selected>Pilih peran Anda</option>
                        <option value="admin">Admin</option>
                        <option value="dosen">Dosen</option>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="kaprodi">Kaprodi</option>
                        <option value="kajur">Kajur</option>
                    </select>
                    @error('roles')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Conditional Inputs -->
                <div id="conditional-fields">
                    <div class="form-group" id="nip-field" style="display: none;">
                        <input id="nip" type="text" class="form-control" name="nip" placeholder="Masukkan NIP">
                    </div>
                    <div class="form-group" id="nidn-field" style="display: none;">
                        <input id="nidn" type="text" class="form-control" name="nidn" placeholder="Masukkan NIDN">
                    </div>
                    <div class="form-group" id="nobp-field" style="display: none;">
                        <input id="nobp" type="text" class="form-control" name="nobp" placeholder="Masukkan NOBP">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <div class="input-group">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Masukkan password">
                        <div class="input-group-append">
                            <div class="input-group-text bg-gray text-white">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password Input -->
                <div class="form-group">
                    <div class="input-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Ulangi password">
                        <div class="input-group-append">
                            <div class="input-group-text bg-gray text-white">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Register Button -->
                <div class="row">
                    <div class="col-8">
                        <a href="/login" class="text-muted">Sudah punya akun? Masuk</a>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var roles = document.getElementById('roles');
        var nipField = document.getElementById('nip-field');
        var nidnField = document.getElementById('nidn-field');
        var nobpField = document.getElementById('nobp-field');

        roles.addEventListener('change', function () {
            nipField.style.display = 'none';
            nidnField.style.display = 'none';
            nobpField.style.display = 'none';

            if (this.value === 'admin') {
                nipField.style.display = 'block';
            } else if (this.value === 'dosen' || this.value === 'kaprodi' || this.value === 'kajur') {
                nidnField.style.display = 'block';
            } else if (this.value === 'mahasiswa') {
                nobpField.style.display = 'block';
            }
        });
    });
</script>
@endsection
