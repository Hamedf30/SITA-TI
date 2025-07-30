@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <!-- Kartu Profil Mahasiswa -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card profile-widget shadow">
                    <div class="profile-widget-header text-center p-4">
                        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" alt="Profile Picture" class="rounded-circle img-thumbnail" style="width: 120px; height: 120px;">
                        <h5 class="mt-3">{{ $mahasiswa->nama }}</h5>
                        <span class="text-muted">{{ $mahasiswa->prodi->nama_prodi }}</span>
                    </div>
                    <div class="profile-widget-description p-4">
                        <h6 class="mb-3">Informasi Mahasiswa</h6>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 40%;">NoBP</th>
                                    <td>{{ $mahasiswa->nobp }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">No Telp</th>
                                    <td>{{ $mahasiswa->telp }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jurusan</th>
                                    <td>{{ $mahasiswa->jurusan->nama_jurusan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Prodi</th>
                                    <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('profile') }}" class="btn btn-primary">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
