@extends('layouts.main')
@section('title', 'List Usulan PKL')

@section('content')
<section class="section custom-section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>List Usulan PKL</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Tempat PKL</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tempat PKL</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Konfirmasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($usulans->count() > 0)
                        @foreach ($usulans as $usulan)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $usulan->mahasiswa->nama }}</td>
                                <td class="align-middle">{{ $usulan->tempatPkl->nama_perusahaan }}</td>
                                <td class="align-middle">{{ $usulan->tahun_ajaran }}</td>
                                <td class="align-middle text-center">
                                    @if ($usulan->konfirmasi == 'Pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif ($usulan->konfirmasi == 'Disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a href="{{ route('mhs_pkl_usulan.show', $usulan->id_usulan) }}">
                                            <button class="btn btn-info" title="Lihat Detail">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </a>
                                        @can('isMahasiswa')
                                            <span style="margin: 0 4px;"></span>
                                            <a href="{{ route('mhs_pkl_usulan.edit', $usulan->id_usulan) }}">
                                                <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                            </a>


                                            <span style="margin: 0 4px;"></span>
                                            <form action="{{ route('mhs_pkl_usulan.destroy', $usulan->id_usulan) }}"
                                                method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        @endcan
                                        @can('isKaprodi')
                                            <span style="margin: 0 4px;"></span>
                                            @if ($usulan->konfirmasi == 'Pending')
                                                <form
                                                    action="{{ route('mhs_pkl_usulan.updateKonfirmasi', $usulan->id_usulan) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="submit" class="btn btn-success" name="konfirmasi"
                                                        value="Disetujui"
                                                        onclick="return confirm('Apakah Anda yakin ingin menyetujui usulan PKL ini?')">
                                                        <i class="bi bi-check2-square"></i>
                                                    </button>

                                                    <button type="submit" class="btn btn-danger" name="konfirmasi"
                                                        value="Ditolak"
                                                        onclick="return confirm('Apakah Anda yakin ingin menolak usulan PKL ini?')">
                                                        <i class="bi bi-x-circle"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <span></span>
                                            @endif
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="align-middle text-center" colspan="6">Usulan PKL tidak ditemukan</td>
                        </tr>
                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Usulan PKL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('mhs_pkl_usulan.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_mhs" class="form-label">Nama Mahasiswa</label>
                                    <select class="form-control @error('id_mhs') is-invalid @enderror" id="id_mhs" name="id_mhs">
                                        <option value="">Pilih Mahasiswa</option>
                                        @foreach ($mahasiswas as $mhs)
                                            <option value="{{ $mhs->id_mhs }}" {{ old('id_mhs') == $mhs->id_mhs ? 'selected' : '' }}>
                                                {{ $mhs->nama }}</option>
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
                                                {{ old('id_tmpt_pkl') == $tempat->id_tmpt_pkl ? 'selected' : '' }}>{{ $tempat->nama_perusahaan }}
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
                                        name="tahun_ajaran" value="{{ old('tahun_ajaran') }}">
                                    @error('tahun_ajaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer br">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
