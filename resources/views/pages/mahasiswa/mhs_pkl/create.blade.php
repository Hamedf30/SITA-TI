@extends('layout.template')

@section('main')
    <h1 class="title">Mahasiswa PKL</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mhs_pkl.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="id_mhs" class="form-label">Nama Mahasiswa</label>
            <select class="form-control" id="id_mhs" name="id_mhs" required>
                <option value="">Pilih Mahasiswa</option>
                @foreach ($mahasiswa as $mhs)
                    <option value="{{ $mhs->id_mhs }}">{{ $mhs->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul PKL</label>
            <textarea class="form-control" id="judul" name="judul" rows="3"></textarea>
        </div>

        {{-- <div class="mb-3">
            <label for="ruang_sidang" class="form-label">Ruang Sidang</label>
            <select class="form-control" id="ruang_sidang" name="ruang_sidang">
                <option value="">Pilih Ruang Sidang</option>
                @foreach ($ruangans as $ruangan)
                    <option value="{{ $ruangan->id_ruangan }}">{{ $ruangan->nama_ruangan }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="mb-3">
            <label for="id_tmpt_pkl" class="form-label">Tempat PKL</label>
            <select class="form-control" id="id_tmpt_pkl" name="id_tmpt_pkl">
                <option value="">Pilih Tempat PKL</option>
                @foreach ($tempatPkl as $tempat)
                    <option value="{{ $tempat->id_tmpt_pkl }}">{{ $tempat->nama_perusahaan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tahun_pkl" class="form-label">Tahun PKL</label>
            <input type="year" class="form-control" id="tahun_pkl" name="tahun_pkl" placeholder="YYYY" />
        </div>

        {{-- <div class="mb-3">
            <label for="dosen_pembimbing" class="form-label">Dosen Pembimbing</label>
            <select class="form-control" id="dosen_pembimbing" name="dosen_pembimbing">
                <option value="">Pilih Dosen Pembimbing</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dosen_penguji" class="form-label">Dosen Penguji</label>
            <select class="form-control" id="dosen_penguji" name="dosen_penguji">
                <option value="">Pilih Dosen Penguji</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>
 --}}
        {{-- <div class="mb-3">
            <label for="pembimbing_pkl" class="form-label">Nama Pembimbing Industri</label>
            <input type="text" class="form-control" id="pembimbing_pkl" name="pembimbing_pkl" />
        </div>

        <div class="mb-3">
            <label for="nilai_pembibing_industri" class="form-label">Nilai Pembimbing Industri</label>
            <input type="number" step="0.01" class="form-control" id="nilai_pembibing_industri"
                name="nilai_pembibing_industri" />
        </div> --}}

        <div class="mb-3">
            <label for="dokument_nilai_industri" class="form-label">Dokument Nilai Industri</label>
            <input type="file" class="form-control" id="dokument_nilai_industri" name="dokument_nilai_industri" />
        </div>

        <div class="mb-3">
            <label for="dokument_pkl" class="form-label">Dokument PKL</label>
            <input type="file" class="form-control" id="dokument_pkl" name="dokument_pkl" />
        </div>

        <div class="mb-3">
            <label for="dokument_pkl_revisi" class="form-label">Dokument Revisi PKL</label>
            <input type="file" class="form-control" id="dokument_pkl_revisi" name="dokument_pkl_revisi" />
        </div>

        <div class="mb-3">
            <label for="dokument_kuisioner" class="form-label">Dokument Kuisioner</label>
            <input type="file" class="form-control" id="dokument_kuisioner" name="dokument_kuisioner" />
        </div>

        {{-- <div class="mb-3">
            <label for="tgl_sidang" class="form-label">Tanggal Sidang</label>
            <input type="datetime-local" class="form-control" id="tgl_sidang" name="tgl_sidang" />
        </div> --}}

        <div class="mb-3">
            <label for="rekomendasi" class="form-label">Rekomendasi</label>
            <input type="text" class="form-control" id="rekomendasi" name="rekomendasi" />
        </div>

        <div class="mb-3">
            <label for="informasi_detail" class="form-label">Informasi Detail</label>
            <textarea class="form-control" id="informasi_detail" name="informasi_detail" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('mhs_pkl.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
