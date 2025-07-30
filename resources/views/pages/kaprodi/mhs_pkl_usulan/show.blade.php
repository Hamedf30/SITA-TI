@extends('layout.template')

@section('main')
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

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th colspan="2" class="text-center">Detail Usulan PKL Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Nama Mahasiswa</th>
                <td>{{ $usulan->mahasiswa->nama }}</td>
            </tr>
            <tr>
                <th>Tempat PKL</th>
                <td>{{ $usulan->tempatPkl->nama_perusahaan }}</td>
            </tr>
            <tr>
                <th>Tahun Ajaran</th>
                <td>{{ $usulan->tahun_ajaran }}</td>
            </tr>
            <tr>
                <th>Konfirmasi</th>
                <td>
                    @if ($usulan->konfirmasi == 'Pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif ($usulan->konfirmasi == 'Disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @elseif ($usulan->konfirmasi == 'Ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @else
                        <span class="badge bg-secondary">Tidak Diketahui</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $usulan->created_at->format('d M Y, H:i') }}</td>
            </tr>
            <tr>
                <th>Terakhir Diperbarui</th>
                <td>{{ $usulan->updated_at->format('d M Y, H:i') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="form-group mt-3">
        <a href="{{ route('mhs_pkl_usulan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
