@extends('layouts.main')

@section('title', 'Edit Profile')

@section('content')
<div class="section">
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-orange text-white d-flex align-items-center">
                        <h4 class="mb-0"><i class="fas fa-user"></i> Edit Profile</h4>
                        <a href="{{ route('ubah-password') }}" class="btn btn-light btn-sm ml-auto">
                            <i class="fas fa-lock"></i> Ubah Password
                        </a>
                    </div>
                    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nama"><i class="fas fa-user"></i> Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $dosen->nama ?? $mahasiswa->nama ?? $kaprodi->nama ?? '' }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="identifier">
                                        @if(Auth::user()->roles == 'mahasiswa')
                                        <i class="fas fa-id-card"></i> NoBP
                                        @else
                                        <i class="fas fa-id-badge"></i> NIDN
                                        @endif
                                    </label>
                                    <input type="text" name="identifier" id="identifier" class="form-control" value="{{ $dosen->nidn ?? $mahasiswa->nobp ?? $kaprodi->nidn ?? '' }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_telp"><i class="fas fa-phone"></i> No. Telp</label>
                                    <input type="tel" name="no_telp" id="no_telp" class="form-control" value="{{ $dosen->no_telp ?? $mahasiswa->telp ?? $kaprodi->no_telp ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="fas fa-map-marker-alt"></i> Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ $dosen->alamat ?? $mahasiswa->alamat ?? $kaprodi->alamat ?? '' }}</textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
