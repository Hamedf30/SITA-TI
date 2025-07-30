@extends('layout.template')

@section('main')
    <h1 class="title">
        <i class="bi bi-plus-circle-fill"></i> Tambah Tempat PKL
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tempat_pkl.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                placeholder="Masukkan nama perusahaan" value="{{ old('nama_perusahaan') }}" required>
        </div>

        <div class="mb-3">
            <label for="info_pkl" class="form-label">Info PKL</label>
            <textarea class="form-control" id="info_pkl" name="info_pkl" placeholder="Masukkan informasi PKL" rows="4"
                required>{{ old('info_pkl') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="number" class="form-control" id="kuota" name="kuota" placeholder="Masukkan kuota"
                value="{{ old('kuota', 4) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="Aktif" {{ old('status') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ old('status') === 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Simpan</button>
        <a href="{{ route('tempat_pkl.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </form>
@endsection
