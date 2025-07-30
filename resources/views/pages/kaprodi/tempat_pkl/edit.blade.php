@extends('layouts.main')

@section('title', 'Edit Tempat PKL')

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
                        <h4>Edit Tempat PKL {{ $tempatPkl->nama_perusahaan }}</h4>
                        <a href="{{ route('tempat_pkl.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tempat_pkl.update', $tempatPkl->id_tmpt_pkl) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                    placeholder="Masukkan nama perusahaan" value="{{ old('nama_perusahaan', $tempatPkl->nama_perusahaan) }}"
                                    required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="info_pkl" class="form-label">Info PKL</label>
                                <textarea class="form-control" id="info_pkl" name="info_pkl" placeholder="Masukkan informasi PKL" rows="4"
                                    required>{{ old('info_pkl', $tempatPkl->info_pkl) }}</textarea>
                            </div>
                    
                            <div class="mb-3">
                                <label for="kuota" class="form-label">Kuota</label>
                                <input type="number" class="form-control" id="kuota" name="kuota" placeholder="Masukkan kuota"
                                    value="{{ old('kuota', $tempatPkl->kuota) }}" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="Aktif" {{ old('status', $tempatPkl->status) === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ old('status', $tempatPkl->status) === 'Tidak Aktif' ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                </select>
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
