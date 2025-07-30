@extends('layout.template')

@section('main')
    <h1 class="title">
        <i class="bi bi-journal"></i> Log Book PKL Mahasiswa
    </h1>

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

    <div class="row py-1 mt-5 mb-3">
        <div class="d-flex align-items-center">
            @can('isMahasiswa')
                <div class="col float-end" style="margin-right: 1rem;">
                    <a href="{{ route('mhs_pkl_log_book.create') }}" class="btn btn-primary float-end">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Log Book
                    </a>
                </div>
            @endcan
            <form class="ml-2" action="{{ route('mhs_pkl_log_book.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari Log Book..."
                        aria-label="Cari Log Book...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-search" type="submit">
                            <span class="ion-android-search">Cari</span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow-sm rounded-lg border-light mb-4 py-1">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-list-ul"></i> Daftar Data PKL</h5>
        </div>
        <div class="table-responsive p-2">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Kegiatan</th>
                        <th>Dokumentasi</th>
                        <th>Validasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($logBooks->count() > 0)
                        @foreach ($logBooks as $logBook)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $logBook->pkl->mahasiswa->nama ?? '-' }}</td>
                                <td class="align-middle">{{ $logBook->tgl_kegiatan_awal }} -
                                    {{ $logBook->tgl_kegiatan_akhir }}
                                </td>
                                <td class="align-middle">{{ $logBook->kegiatan }}</td>
                                <td class="align-middle text-center">
                                    @if ($logBook->file_dokumentasi)
                                        <a href="{{ asset('storage/' . $logBook->file_dokumentasi) }}" target="_blank"
                                            class="btn btn-link">Lihat</a>
                                    @else
                                        <span class="text-muted">Tidak Ada</span>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    @if ($logBook->validasi == 'Belum Divalidasi')
                                        <span class="badge bg-warning">Belum Divalidasi</span>
                                    @elseif ($logBook->validasi == 'Sudah Divalidasi')
                                        <span class="badge bg-success">Sudah Divalidasi</span>
                                    @else
                                        <span class="badge bg-secondary">Status Tidak Diketahui</span>
                                    @endif
                                </td>


                                <td class="align-middle text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('mhs_pkl_log_book.edit', $logBook->id_log_book) }}">
                                            <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                        </a>
                                        <span style="margin: 0 4px;"></span>
                                        <form action="{{ route('mhs_pkl_log_book.validate', $logBook->id_log_book) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Apakah Anda yakin ingin meng-validasi lOG BoOK ini?')"
                                                @if ($logBook->validasi === 'Sudah Divalidasi') disabled style="opacity: 0.5;" @endif>
                                                <i class="bi bi-check-all"></i>
                                            </button>
                                        </form>
                                        <span style="margin: 0 4px;"></span>
                                        <form action="{{ route('mhs_pkl_log_book.destroy', $logBook->id_log_book) }}"
                                            method="POST" class="d-inline" onsubmit="return confirm('Hapus Log Book?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="align-middle text-center" colspan="7">Log Book tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <nav>
        <ul class="pagination">
            @if ($logBooks->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $logBooks->previousPageUrl() }}"
                        rel="prev">Previous</a></li>
            @endif

            @php
                $currentPage = $logBooks->currentPage();
                $lastPage = $logBooks->lastPage();
                $pageRange = 3;

                $startPage = max($currentPage - $pageRange, 1);
                $endPage = min($currentPage + $pageRange, $lastPage);
            @endphp

            @for ($i = $startPage; $i <= $endPage; $i++)
                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ $logBooks->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($logBooks->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $logBooks->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">Next</span></li>
            @endif
        </ul>
    </nav>
@endsection
