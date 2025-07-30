@extends('layouts.main')
@section('title', 'Bimbingan TA')

@section('content')
<section class="section custom-section">
    <div class="container">
        <h1>Bimbingan Proposal TA</h1>
    
        <!-- Pesan sukses atau error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    
        <!-- Informasi Pembimbing -->
        <div class="card mb-4">
            <div class="card-body">
                <h4>Informasi Pembimbing</h4>
                <p><strong>Pembimbing 1:</strong> {{ $pembimbing1->dosen->nama ?? 'Belum ditentukan' }}</p>
                <p><strong>Pembimbing 2:</strong> {{ $pembimbing2->dosen->nama ?? 'Belum ditentukan' }}</p>
            </div>
        </div>
    
        <!-- Tabel Bimbingan -->
        <div class="card">
            <div class="card-body">
                <h4>Riwayat Bimbingan</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Pembimbing</th>
                            <th>Pembahasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bimbingan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                <td>{{ $item->dosen->nama }}</td>
                                <td>{{ $item->pembahasan }}</td>
                                <td>
                                    <form action="{{ route('bimbingan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus bimbingan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada riwayat bimbingan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    
        <!-- Form Tambah Bimbingan -->
        <div class="card mt-4">
            <div class="card-body">
                <h4>Tambah Bimbingan</h4>
                <form action="{{ route('bimbingan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="dosen_id" class="form-label">Pilih Pembimbing</label>
                        <select name="dosen_id" id="dosen_id" class="form-control" required>
                            @if($pembimbing1)
                                <option value="{{ $pembimbing1->dosen->id }}">Pembimbing 1 - {{ $pembimbing1->dosen->nama }}</option>
                            @endif
                            @if($pembimbing2)
                                <option value="{{ $pembimbing2->dosen->id }}">Pembimbing 2 - {{ $pembimbing2->dosen->nama }}</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pembahasan" class="form-label">Pembahasan</label>
                        <textarea name="pembahasan" id="pembahasan" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    
        <!-- Tombol Cek Status Bimbingan -->
        <div class="mt-4">
            <form action="{{ route('bimbingan.check-status') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Cek Status Seminar Proposal</button>
            </form>
        </div>
    </div>    
</section>
@endsection
