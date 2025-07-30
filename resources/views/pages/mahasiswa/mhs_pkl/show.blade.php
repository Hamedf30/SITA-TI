@extends('layout.template')

@section('main')
    <div class="card shadow-lg rounded-lg">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0"><strong>Detail Mahasiswa PKL</strong></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Nama Mahasiswa
                            </th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->mahasiswa->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Judul PKL</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">{{ $mhsPkl->judul ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Ruang Sidang
                            </th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->ruangan->nama_ruangan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Tempat PKL</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->tempatPkl->nama_perusahaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Tahun PKL</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">{{ $mhsPkl->tahun_pkl ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Dosen Pembimbing
                            </th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->dosenPembimbing->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Dosen Penguji
                            </th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->dosenPenguji->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Pembimbing
                                Industri</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->pembimbing_pkl ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Nilai Pembimbing
                                Industri</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->nilai_pembibing_industri ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Dokumen Nilai
                                Industri</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                @if ($mhsPkl->dokument_nilai_industri)
                                    <a href="{{ asset('storage/' . $mhsPkl->dokument_nilai_industri) }}"
                                        target="_blank">Lihat File</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Dokumen PKL</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                @if ($mhsPkl->dokument_pkl)
                                    <a href="{{ asset('storage/' . $mhsPkl->dokument_pkl) }}" target="_blank">Lihat
                                        File</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Dokumen Revisi
                                PKL</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                @if ($mhsPkl->dokument_pkl_revisi)
                                    <a href="{{ asset('storage/' . $mhsPkl->dokument_pkl_revisi) }}" target="_blank">Lihat
                                        File</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Dokumen
                                Kuisioner</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                @if ($mhsPkl->dokument_kuisioner)
                                    <a href="{{ asset('storage/' . $mhsPkl->dokument_kuisioner) }}" target="_blank">Lihat
                                        File</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Tanggal Sidang
                            </th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->tgl_sidang ? \Carbon\Carbon::parse($mhsPkl->tgl_sidang)->format('d-m-Y H:i') : '-' }}
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Rekomendasi</th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->rekomendasi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 50%; word-wrap: break-word; text-align: left;">Informasi Detail
                            </th>
                            <td style="width: 50%; word-wrap: break-word; text-align: left;">
                                {{ $mhsPkl->informasi_detail ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-3">
                    <a href="{{ route('mhs_pkl.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
