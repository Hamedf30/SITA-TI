@extends('layout.template')

@section('main')
    <h1 class="title">
        <i class="bi bi-plus-circle-fill"></i> Jadwalkan Sidang
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><i class="bi bi-exclamation-circle-fill"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('mhs_pkl.tentukanPenjadwalan', $pkl->id_pkl) }}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="dosen_penguji" class="form-label">Dosen Penguji</label>
            <select class="form-control" id="dosen_penguji" name="dosen_penguji">
                <option value="">Pilih Dosen Penguji</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pembimbing_pkl" class="form-label">Nama Pembimbing Industri</label>
            <input type="text" class="form-control" id="pembimbing_pkl" name="pembimbing_pkl" />
        </div>
        <div class="mb-3">
            <label for="ruang_sidang" class="form-label">Ruang Sidang</label>
            <select class="form-control" id="ruang_sidang" name="ruang_sidang">
                <option value="">Pilih Ruang Sidang</option>
                @foreach ($ruangans as $ruangan)
                    <option value="{{ $ruangan->id_ruangan }}">{{ $ruangan->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_sidang" class="form-label">Tanggal Sidang</label>
            <input type="datetime-local" class="form-control" id="tgl_sidang" name="tgl_sidang" />
        </div>
        <div class="mb-3 row">
            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
