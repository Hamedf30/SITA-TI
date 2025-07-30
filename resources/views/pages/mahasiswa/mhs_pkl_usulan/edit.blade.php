@extends('layout.template')

@section('main')
    <h3 class="title">
        <i class="bi bi-pencil"></i> Edit Usulan PKL Mahasiswa
    </h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('mhs_pkl_usulan.update', $usulan->id_usulan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_mhs" class="form-label">Nama Mahasiswa</label>
            <select class="form-control @error('id_mhs') is-invalid @enderror" id="id_mhs" name="id_mhs">
                <option value="">Pilih Mahasiswa</option>
                @foreach ($mahasiswas as $mhs)
                    <option value="{{ $mhs->id_mhs }}"
                        {{ old('id_mhs', $usulan->id_mhs) == $mhs->id_mhs ? 'selected' : '' }}>
                        {{ $mhs->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_mhs')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_tmpt_pkl" class="form-label">Tempat PKL</label>
            <select class="form-control @error('id_tmpt_pkl') is-invalid @enderror" id="id_tmpt_pkl" name="id_tmpt_pkl">
                <option value="">Pilih Tempat PKL</option>
                @foreach ($tempatPkl as $tempat)
                    <option value="{{ $tempat->id_tmpt_pkl }}"
                        {{ old('id_tmpt_pkl', $usulan->id_tmpt_pkl) == $tempat->id_tmpt_pkl ? 'selected' : '' }}>
                        {{ $tempat->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
            @error('id_tmpt_pkl')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                name="tahun_ajaran" value="{{ old('tahun_ajaran', $usulan->tahun_ajaran) }}">
            @error('tahun_ajaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="konfirmasi" class="form-label">Konfirmasi</label>
            <select class="form-control @error('konfirmasi') is-invalid @enderror" id="konfirmasi" name="konfirmasi">
                <option value="Pending" {{ old('konfirmasi', $usulan->konfirmasi) == 'Pending' ? 'selected' : '' }}>Pending
                </option>
                <option value="Disetujui" {{ old('konfirmasi', $usulan->konfirmasi) == 'Disetujui' ? 'selected' : '' }}>
                    Disetujui</option>
                <option value="Ditolak" {{ old('konfirmasi', $usulan->konfirmasi) == 'Ditolak' ? 'selected' : '' }}>Ditolak
                </option>
            </select>
            @error('konfirmasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Simpan
            </button>
            <a href="{{ route('mhs_pkl_usulan.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
@endsection
