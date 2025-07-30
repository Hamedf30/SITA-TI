<?php

namespace App\Http\Controllers;

use App\Models\mhs_pkl;
use Illuminate\Http\Request;
use App\Models\mhs_pkl_log_book;
use Illuminate\Support\Facades\Storage;

class MhsPklLogBookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $logBooks = mhs_pkl_log_book::when($search, function ($query, $search) {
            return $query->where('kegiatan', 'like', "%{$search}%");
        })->paginate(10);

        return view('mhs_pkl_log_book.index', compact('logBooks'));
    }
    public function create()
    {
        $mhsPkl = mhs_pkl::all();
        return view('mhs_pkl_log_book.create',compact('mhsPkl', ));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pkl' => 'nullable|exists:mhs_pkl,id_pkl',
            'tgl_kegiatan_awal' => 'required|date',
            'tgl_kegiatan_akhir' => 'required|date|after_or_equal:tgl_kegiatan_awal',
            'kegiatan' => 'required|string',
            'file_dokumentasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if (empty($validatedData['validasi'])) {
            $validatedData['validasi'] = 'Belum Divalidasi';
        }

        if ($request->hasFile('file_dokumentasi')) {
            $validatedData['file_dokumentasi'] = $request->file('file_dokumentasi')->store('log_book_files', 'public');
        }

        mhs_pkl_log_book::create($validatedData);

        return redirect()->route('mhs_pkl_log_book.index')->with('success', 'Log Book berhasil ditambahkan.');
    }
    public function show($id)
    {
        $logBook = Mhs_Pkl_Log_Book::find($id);
        if (!$logBook) {
            return redirect()->route('mhs_pkl_log_book.index')->with('error', 'Log Book tidak ditemukan.');
        }
        return view('mhs_pkl_log_book.show', compact('logBook'));
    }

    public function edit($id)
    {
        $logBook = Mhs_Pkl_Log_Book::find($id);
        $mhsPkl = mhs_pkl::all();
        if (!$logBook) {
            return redirect()->route('mhs_pkl_log_book.index')->with('error', 'Log Book tidak ditemukan.');
        }
        return view('mhs_pkl_log_book.edit', compact('logBook','mhsPkl'));
    }

    public function update(Request $request, mhs_pkl_log_book $logBook)
    {
        $validatedData = $request->validate([
            'id_pkl' => 'nullable|exists:mhs_pkl,id_pkl',
            'tgl_kegiatan_awal' => 'required|date',
            'tgl_kegiatan_akhir' => 'required|date|after_or_equal:tgl_kegiatan_awal',
            'kegiatan' => 'required|string',
            'file_dokumentasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('file_dokumentasi')) {
            // Hapus file lama jika ada
            if ($logBook->file_dokumentasi) {
                Storage::disk('public')->delete($logBook->file_dokumentasi);
            }

            $validatedData['file_dokumentasi'] = $request->file('file_dokumentasi')->store('log_book_files', 'public');
        }

        $logBook->update($validatedData);

        return redirect()->route('mhs_pkl_log_book.index')->with('success', 'Log Book berhasil diperbarui.');
    }


    public function validateBimbingan($id)
    {
        $LogBook = Mhs_Pkl_Log_Book::findOrFail($id);
        $LogBook->validasi = 'Sudah Divalidasi';
        $LogBook->save();

        return redirect()->route('mhs_pkl_log_book.index')->with('success', 'Log Book berhasil divalidasi.');
    }
    public function destroy($id)
    {
        $logBook = Mhs_Pkl_Log_Book::find($id);
        if (!$logBook) {
            return redirect()->route('mhs_pkl_log_book.index')->with('error', 'Log Book tidak ditemukan.');
        }
        if ($logBook->file_dokumentasi) {
            Storage::disk('public')->delete($logBook->file_dokumentasi);
        }
        $logBook->delete();

        return redirect()->route('mhs_pkl_log_book.index')->with('success', 'Log Book berhasil dihapus.');
    }
}
