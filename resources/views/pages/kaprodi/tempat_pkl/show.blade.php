@extends('layout.template')

@section('main')
    <h1 class="title">
        <i class="bi bi-info-circle"></i> Detail Tempat PKL
    </h1>

    <div class="card mt-4">
        <div class="card-header bg-primary text-white mb-3">
            <h5>{{ $tempatPkl->nama_perusahaan }}</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Informasi PKL</th>
                    <td>{{ $tempatPkl->info_pkl }}</td>
                </tr>
                <tr>
                    <th>Kuota</th>
                    <td>{{ $tempatPkl->kuota }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge bg-{{ $tempatPkl->status === 'Aktif' ? 'success' : 'danger' }}">
                            {{ $tempatPkl->status }}
                        </span>
                    </td>
                </tr>
            </table>

            <a href="{{ route('tempat_pkl.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@endsection
