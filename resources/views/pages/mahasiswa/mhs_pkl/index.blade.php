@extends('layout.template')

@section('main')
    <h1 class="title">
        <i class="bi bi-person-badge"></i> Data Mahasiswa PKL
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

    <div class="row py-1 mt-3 mb-3">
        <div class="d-flex align-items-center">
            @can('isMahasiswa')
                <div class="col float-end" style="margin-right: 1rem;">
                    <a href="{{ route('mhs_pkl.create') }}" class="btn btn-primary float-end">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Mahasiswa PKL
                    </a>
                </div>
            @endcan

            <form class="ml-2" action="{{ route('mhs_pkl.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari Mahasiswa PKL..."
                        aria-label="Cari Mahasiswa PKL...">
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
        <div class="table-responsive p-3">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tempat PKL</th>
                        <th>Tahun PKL</th>
                        <th>Dosen Pembimbing</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($mhsPkl->count() > 0)
                        @foreach ($mhsPkl as $pkl)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $pkl->mahasiswa->nama ?? '-' }}</td>
                                <td class="align-middle">{{ $pkl->tempatPkl->nama_perusahaan ?? '-' }}</td>
                                <td class="align-middle">{{ $pkl->tahun_pkl ?? '-' }}</td>
                                <td class="align-middle">{{ $pkl->dosenPembimbing->nama ?? '-' }}</td>
                                <td class="align-middle text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a href="{{ route('mhs_pkl.show', $pkl->id_pkl) }}">
                                            <button class="btn btn-info" title="Lihat Detail">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </a>
                                        @can('isMahasiswa')
                                            <span style="margin: 0 4px;"></span>
                                            <a href="{{ route('mhs_pkl.edit', $pkl->id_pkl) }}">
                                                <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                            </a>
                                        @endcan

                                        @can('isKaprodi')
                                            <span style="margin: 0 4px;"></span>
                                            <form action="{{ route('mhs_pkl.showTentukanPembimbingForm', $pkl->id_pkl) }}"
                                                method="GET" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bi bi-mortarboard-fill"></i>
                                                </button>
                                            </form>

                                            <span style="margin: 0 4px;"></span>
                                            <form action="{{ route('mhs_pkl.showTentukanPenjadwalan', $pkl->id_pkl) }}"
                                                method="GET" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success">
                                                    <i class="bi bi-calendar-check-fill"></i>
                                                </button>
                                            </form>
                                        @endcan
                                        @can('isMahasiswa')
                                            <span style="margin: 0 4px;"></span>
                                            <form action="{{ route('mhs_pkl.destroy', $pkl->id_pkl) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        @endcan

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="align-middle text-center" colspan="7">Mahasiswa PKL tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <nav>
        <ul class="pagination">
            @if ($mhsPkl->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $mhsPkl->previousPageUrl() }}"
                        rel="prev">Previous</a></li>
            @endif

            @php
                $currentPage = $mhsPkl->currentPage();
                $lastPage = $mhsPkl->lastPage();
                $pageRange = 3;

                $startPage = max($currentPage - $pageRange, 1);
                $endPage = min($currentPage + $pageRange, $lastPage);
            @endphp

            @for ($i = $startPage; $i <= $endPage; $i++)
                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ $mhsPkl->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($mhsPkl->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $mhsPkl->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">Next</span></li>
            @endif
        </ul>
    </nav>
@endsection
