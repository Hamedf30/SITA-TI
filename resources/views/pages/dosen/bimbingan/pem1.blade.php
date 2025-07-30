@extends('layouts.main')
@section('title', 'Bimbingan Pembimbing 1')

@section('content')
<div class="container">
    <h1>Bimbingan oleh {{ $dosen->nama }}</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Pembahasan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bimbingan as $key => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->mahasiswa->nama }}</td>
                    <td>{{ $item->pembahasan }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data bimbingan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
