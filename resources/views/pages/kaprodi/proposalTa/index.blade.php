@extends('layouts.main')
@section('title', 'Verfikasi Proposal TA')

@section('content')
<section class="section custom-section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Verifikasi Proposal TA</h4>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Judul Proposal</th>
                                        <th>Tambah Pembimbing</th>
                                        <th>Pembimbing 1</th>
                                        <th>Pembimbing 2</th>
                                        <th>Verifikasi</th>
                                        <th>Komentar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($proposal_ta as $proposal)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $proposal->mahasiswa->nama }}</td>
                                            <td>{{ $proposal->judul }}</td>
                                            <td>
                                                <button class="btn btn-secondary" data-toggle="modal" data-target="#pembimbing1Modal">
                                                    <i class="nav-icon fas fa-user-plus"></i>&nbsp; Add Pembimbing 1
                                                </button>
                                                @if($proposal->pem1)
                                                    <p><strong>Pembimbing 1:</strong> {{ $proposal->pem1->dosen ? $proposal->pem1->dosen->nama : 'Belum ditentukan' }}</p>
                                                @else
                                                    <p><strong>Pembimbing 1:</strong> Belum ditentukan</p>
                                                @endif
                                                <button class="btn btn-secondary mt-1" data-toggle="modal" data-target="#pembimbing2Modal">
                                                    <i class="nav-icon fas fa-user-plus"></i>&nbsp; Add Pembimbing 2
                                                </button>
                                                @if($proposal->pem2)
                                                    <p><strong>Pembimbing 2:</strong> {{ $proposal->pem2->dosen ? $proposal->pem2->dosen->nama : 'Belum ditentukan' }}</p>
                                                @else
                                                    <p><strong>Pembimbing 2:</strong> Belum ditentukan</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($proposal->pem1)
                                                    {{ $proposal->pem1->status == 1 ? 'Disetujui' : 'Belum disetujui' }}
                                                @else
                                                    Belum ditentukan
                                                @endif
                                            </td>
                                            <td>
                                                @if($proposal->pem2)
                                                    {{ $proposal->pem2->status == 1 ? 'Disetujui' : 'Belum disetujui' }}
                                                @else
                                                    Belum ditentukan
                                                @endif
                                            </td>
                                            <td>
                                                @if($proposal)
                                                    {{ $proposal->verifikasi == 1 ? 'Sudah' : 'Belum' }}
                                                @else
                                                    Belum ditentukan
                                                @endif
                                            </td>
                                            <td>{{ $proposal->komentar }}</td>
                                            <td>
                                                @if($proposal->pem1 && $proposal->pem2 && $proposal->pem1->status == 1 && $proposal->pem2->status == 1)
                                                <div class="mb-2 mt-2">
                                                    <form method="POST" action="{{ route('kaprodi.verifyProposal', $proposal->id) }}">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm" type="submit">Verifikasi</button>
                                                    </form>
                                                </div>
                                                @else
                                                    <button class="btn btn-secondary btn-sm" disabled>Belum bisa diverifikasi</button>
                                                @endif
                                                <form method="POST" action="{{ route('proposalTa.commentKaprodi', $proposal->id) }}">
                                                    @csrf
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="komentar" class="form-control" value="Isi komentar" onfocus="if(this.value=='Isi komentar') this.value='';">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-muted text-center">Data proposal belum tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Add Pembimbing 1 Modal -->
                <!-- Add Pembimbing 1 Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="pembimbing1Modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Pembimbing 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('proposalTa.pem1') }}" method="POST">
                    @csrf
                    @if(isset($proposal) && $proposal)
                        <input type="hidden" name="proposal_ta_id" value="{{ $proposal->id }}">
                    @else
                        <p>Proposal belum tersedia.</p>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dosen_id">Dosen Pembimbing 1</label>
                                <select id="dosen_id" name="dosen_id" class="form-control @error('dosen_id') is-invalid @enderror" required>
                                    @foreach($dosen as $dosens)
                                        <option value="{{ $dosens->id }}">{{ $dosens->nama }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

<!-- Add Pembimbing 2 Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="pembimbing2Modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Pembimbing 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('proposalTa.pem2') }}" method="POST">
                    @csrf
                    @if(isset($proposal) && $proposal)
                        <input type="hidden" name="proposal_ta_id" value="{{ $proposal->id }}">
                    @else
                        <p>Proposal belum tersedia.</p>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dosen_id">Dosen Pembimbing 2</label>
                                <select id="dosen_id" name="dosen_id" class="form-control @error('dosen_id') is-invalid @enderror" required>
                                    @foreach($dosen as $dosens)
                                        <option value="{{ $dosens->id }}">{{ $dosens->nama }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    </div>
</section>
@endsection
