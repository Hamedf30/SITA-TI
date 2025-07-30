@extends('layouts.main')
@section('title', 'List Tempat PKL')

@section('content')
<section class="section custom-section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>List Tempat PKL</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Tempat PKL</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Info PKL</th>
                                        <th>Kuota</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tempatPkl->count() > 0)
                        @foreach ($tempatPkl as $tempat)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $tempat->nama_perusahaan }}</td>
                                <td class="align-middle">{{ $tempat->info_pkl }}</td>
                                <td class="align-middle text-center">{{ $tempat->kuota }}</td>
                                <td class="align-middle text-center">{{ $tempat->status }}</td>
                                <td class="align-middle text-center">
                                    <div class="d-flex">
                                        <a href="{{ route('tempat_pkl.show', $tempat->id_tmpt_pkl) }}" class="btn btn-primary btn-sm" style="margin-right: 8px"><i class="nav-icon fas fa-eye"></i> &nbsp; Detail</a>
                                        <a href="{{ route('tempat_pkl.edit', $tempat->id_tmpt_pkl) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                                        <form method="POST" action="{{ route('tempat_pkl.destroy', $tempat->id_tmpt_pkl) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' style="margin-left: 8px"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="align-middle text-center" colspan="6">Tempat PKL tidak ditemukan</td>
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
                            <h5 class="modal-title">Tambah Tempat PKL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('tempat_pkl.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
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
                                        <div class="form-group">
                                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                                placeholder="Masukkan nama perusahaan" value="{{ old('nama_perusahaan') }}" required>
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="info_pkl" class="form-label">Info PKL</label>
                                            <textarea class="form-control" id="info_pkl" name="info_pkl" placeholder="Masukkan informasi PKL" rows="4"
                                                required>{{ old('info_pkl') }}</textarea>
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="kuota" class="form-label">Kuota</label>
                                            <input type="number" class="form-control" id="kuota" name="kuota" placeholder="Masukkan kuota"
                                                value="{{ old('kuota', 4) }}" required>
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="Aktif" {{ old('status') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Tidak Aktif" {{ old('status') === 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
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
