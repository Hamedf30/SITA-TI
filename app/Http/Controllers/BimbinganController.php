<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Pembimbing1;
use App\Models\Pembimbing2;
use App\Models\ProposalTa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimbinganController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('nobp', $user->nobp)->first();
        $bimbingan = Bimbingan::where('mahasiswa_id', $mahasiswa->id)->get();
        $pembimbing1 = Pembimbing1::where('mahasiswa_id', $mahasiswa->id)->first();
        $pembimbing2 = Pembimbing2::where('mahasiswa_id', $mahasiswa->id)->first();

        return view('pages.mahasiswa.bimbingan.index', compact('bimbingan', 'pembimbing1', 'pembimbing2', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pembahasan' => 'required|string|max:255',
            'dosen_id' => 'required|exists:dosens,id', // Pastikan dosen_id valid
        ]);

        $mahasiswa = Mahasiswa::where('nobp', Auth::user()->nobp)->first();

        // Simpan bimbingan
        Bimbingan::create([
            'mahasiswa_id' => $mahasiswa->id,
            'dosen_id' => $request->dosen_id,
            'pembahasan' => $request->pembahasan,
        ]);

        return redirect()->route('bimbingan.index')->with('success', 'Bimbingan berhasil ditambahkan.');
    }

        /**
     * Menampilkan data bimbingan untuk pembimbing 1.
     */
    public function indexForPembimbing1()
    {
        // Ambil data dosen yang sedang login
        $dosen = Dosen::where('user_id', Auth::id())->first();

        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }

        // Ambil data bimbingan dengan filter dosen_id (pembimbing 1)
        $bimbingan = Bimbingan::whereHas('pem1', function ($query) use ($dosen) {
            $query->where('dosen_id', $dosen->id);
        })->orderBy('id', 'asc')->get();

        return view('pages.dosen.bimbingan.pem1', compact('bimbingan', 'dosen', 'pem1'));
    }




    public function indexForPembimbing2()
    {
        // Ambil data dosen yang sedang login
        $dosen = Dosen::where('user_id', Auth::id())->first();

        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }

        // Ambil data bimbingan dengan filter dosen_id (pembimbing 2)
        $bimbingan = Bimbingan::whereHas('pem2', function ($query) use ($dosen) {
            $query->where('dosen_id', $dosen->id);
        })->orderBy('id', 'asc')->get();

        return view('pages.dosen.bimbingan.pem2', compact('bimbingan', 'dosen', 'pem2'));
    }


    public function checkBimbinganStatus()
    {
        $mahasiswa = Mahasiswa::where('nobp', Auth::user()->nobp)->first();

        // Hitung jumlah bimbingan dengan Pembimbing 1 dan Pembimbing 2
        $countPembimbing1 = Bimbingan::where('mahasiswa_id', $mahasiswa->id)
            ->where('dosen_id', function ($query) use ($mahasiswa) {
                $query->select('dosen_id')
                    ->from('pembimbing1s')
                    ->where('mahasiswa_id', $mahasiswa->id);
            })
            ->count();

        $countPembimbing2 = Bimbingan::where('mahasiswa_id', $mahasiswa->id)
            ->where('dosen_id', function ($query) use ($mahasiswa) {
                $query->select('dosen_id')
                    ->from('pembimbing2s')
                    ->where('mahasiswa_id', $mahasiswa->id);
            })
            ->count();

        // Cek apakah mahasiswa memenuhi syarat untuk seminar proposal
        if ($countPembimbing1 >= 9 && $countPembimbing2 >= 9) {
            return redirect()->route('bimbingan.index')->with('success', 'Anda memenuhi syarat untuk mengajukan seminar proposal.');
        }

        return redirect()->back()->with('error', 'Anda belum memenuhi syarat untuk seminar proposal. Pastikan bimbingan dengan Pembimbing 1 dan 2 masing-masing minimal 9 kali.');
    }

    public function destroy($id)
    {
        $bimbingan = Bimbingan::findOrFail($id);
        $bimbingan->delete();

        return redirect()->route('bimbingan.index')->with('success', 'Bimbingan berhasil dihapus.');
    }
}
