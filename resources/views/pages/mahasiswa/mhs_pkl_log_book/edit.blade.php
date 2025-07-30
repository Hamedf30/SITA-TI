@extends('layout.template')

@section('main')
    <h1 class="title">
        <i class="bi bi-pencil-square"></i> Edit Log Book PKL Mahasiswa
    </h1>

    <form action="{{ route('mhs_pkl_log_book.update', $logBook->id_log_book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_pkl" class="form-label">ID PKL (Opsional)</label>
            <select class="form-select" name="id_pkl" id="id_pkl">
                <option value="" {{ old('id_pkl', $logBook->id_pkl) == '' ? 'selected' : '' }}>Tidak Ada</option>
                @foreach ($mhsPkl as $pkl)
                    <option value="{{ $pkl->id_pkl }}"
                        {{ old('id_pkl', $logBook->id_pkl) == $pkl->id_pkl ? 'selected' : '' }}>
                        {{ $pkl->nama }} - {{ $pkl->judul }}
                    </option>
                @endforeach
            </select>
            @error('id_pkl')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="mb-3">
            <label for="tgl_kegiatan_awal" class="form-label">Tanggal Kegiatan Awal</label>
            <input type="date" class="form-control" id="tgl_kegiatan_awal" name="tgl_kegiatan_awal"
                value="{{ old('tgl_kegiatan_awal', $logBook->tgl_kegiatan_awal) }}" required>
            @error('tgl_kegiatan_awal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tgl_kegiatan_akhir" class="form-label">Tanggal Kegiatan Akhir</label>
            <input type="date" class="form-control" id="tgl_kegiatan_akhir" name="tgl_kegiatan_akhir"
                value="{{ old('tgl_kegiatan_akhir', $logBook->tgl_kegiatan_akhir) }}" required>
            @error('tgl_kegiatan_akhir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kegiatan" class="form-label">Kegiatan</label>
            <textarea class="form-control" id="kegiatan" name="kegiatan" rows="4" required>{{ old('kegiatan', $logBook->kegiatan) }}</textarea>
            @error('kegiatan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file_dokumentasi" class="form-label">File Dokumentasi (Opsional)</label>
            <input type="file" class="form-control" id="file_dokumentasi" name="file_dokumentasi">
            @if ($logBook->file_dokumentasi)
                <small class="form-text">
                    Dokumen saat ini: <a href="{{ asset('storage/' . $logBook->file_dokumentasi) }}" target="_blank">Lihat
                        Dokumen</a>
                </small>
            @endif
            @error('file_dokumentasi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan Perubahan
        </button>
        <a href="{{ route('mhs_pkl_log_book.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </form>
@endsection
