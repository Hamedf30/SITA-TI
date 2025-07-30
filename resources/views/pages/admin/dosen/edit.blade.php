@extends('layouts.main')

@section('title', 'Edit Dosen')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        @foreach ($errors->all() as $error )
                        {{ $error }}
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Edit Dosen {{ $dosen->nama }}</h4>
                        <a href="{{ route('dosen.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dosen.update', $dosen->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama Dosen</label>
                                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Dosen') }}" value="{{ $dosen->nama }}">
                            </div>
                            <div class="d-flex">
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" id="nidn" name="nidn" class="form-control @error('nidn') is-invalid @enderror" placeholder="{{ __('NIDN Dosen') }}" value="{{ $dosen->nidn }}">
                                </div>
                                <div class="form-group ml-4">
                                    <label for="no_telp">No. Telp</label>
                                    <input type="text" id="no_telp" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="{{ __('No. TElp Dosen') }}" value="{{ $dosen->no_telp }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Alamat') }}">{{ $dosen->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jurusan_id">Jurusan</label>
                                <select id="jurusan_id" name="jurusan_id" class="select2 form-control @error('jurusan_id') is-invalid @enderror">
                                    <option value="">-- Pilih jurusan --</option>
                                    @foreach ($jurusan as $data )
                                    <option value="{{ $data->id }}" @if ($dosen->jurusan_id == $data->id)
                                        selected
                                        @endif
                                        >{{ $data->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prodi_id">Prodi</label>
                                <select id="prodi_id" name="prodi_id" class="select2bs4 form-control @error('prodi_id') is-invalid @enderror">
                                    <option value="">-- Pilih Prodi --</option>
                                    @foreach ($prodi as $data )
                                    <option value="{{ $data->id }}" @if ($dosen->prodi_id == $data->id)
                                        selected
                                        @endif
                                        >{{ $data->nama_prodi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jekel" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" id="jekel" name="jekel" required>
                                    <option value="pria" {{ $dosen->jekel == 'pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="wanita" {{ $dosen->jekel == 'wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Foto Profil</label>
                                <input type="file" name="gambar" class="form-control" accept="image/*" placeholder="{{ __('gambar') }}">{{ $dosen->gambar }}>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
