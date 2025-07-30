@section('main')
    <h1 class="title">
        <i class="bi bi-journal-text"></i> Detail Log Book PKL Mahasiswa
    </h1>

    <table class="table table-bordered">
        <tr>
            <th>Tanggal Kegiatan Awal</th>
            <td>{{ $logBook->tgl_kegiatan_awal ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tanggal Kegiatan Akhir</th>
            <td>{{ $logBook->tgl_kegiatan_akhir ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kegiatan</th>
            <td>{{ $logBook->kegiatan ?? '-' }}</td>
        </tr>
        <tr>
            <th>File Dokumentasi</th>
            <td>
                @if ($logBook->file_dokumentasi)
                    <a href="{{ asset('storage/' . $logBook->file_dokumentasi) }}" target="_blank">Lihat Dokumen</a>
                @else
                    <span>Tidak ada dokumentasi</span>
                @endif
            </td>
        </tr>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('mhs_pkl_log_book.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
@endsection
