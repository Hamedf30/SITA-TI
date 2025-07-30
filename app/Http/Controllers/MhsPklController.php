<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\bidang;
use App\Models\Mhs_Pkl;
use App\Models\Ruangan;
use App\Models\Tempat_Pkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MhsPklController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $user = auth()->user();
        $mhsPkl = Mhs_Pkl::with(['mahasiswa', 'ruangan', 'tempatPkl', 'dosenPembimbing', 'dosenPenguji'])
            ->when($search, function ($query, $search) {
                return $query->where('judul_pkl', 'like', '%' . $search . '%')
                    ->orWhereHas('mahasiswa', function ($q) use ($search) {
                        $q->where('nama', 'like', '%' . $search . '%');
                    });
            })
            ->where(function ($query) use ($user) {
                if ($user->level->level === 'Dosen') {
                    $query->where(function ($q) use ($user) {
                        $q->where('dosen_pembimbing', $user->dosen->id_dosen)
                        ->orWhere('dosen_penguji', $user->dosen->id_dosen);
                    });
                } elseif ($user->level->level === 'Mahasiswa') {
                    $query->where('id_mhs', $user->mahasiswa->id_mhs);
                } elseif ($user->level->level === 'Kaprodi') {
                }
            })
            ->paginate(10);

        return view('mhs_pkl.index', compact('mhsPkl'));
    }

    public function create()
    {
        $mahasiswa = Mhs::all();
        $ruangans = Ruangan::all();
        $tempatPkl = Tempat_Pkl::all();
        $dosens = Dosen::all();

        return view('mhs_pkl.create', compact('mahasiswa', 'ruangans', 'tempatPkl', 'dosens'));
    }

    // Menyimpan data Mahasiswa PKL
    public function store(Request $request)
    {
        $request->validate([
            'id_mhs' => 'required|exists:mhs,id_mhs',
            'judul' => 'nullable|string|max:255',
            'ruang_sidang' => 'nullable|exists:ruangans,id_ruangan',
            'id_tmpt_pkl' => 'nullable|exists:tempat_pkl,id_tmpt_pkl',
            'tahun_pkl' => 'nullable|date_format:Y',
            'dosen_pembimbing' => 'nullable|exists:dosens,id_dosen',
            'dosen_penguji' => 'nullable|exists:dosens,id_dosen',
            'pembimbing_pkl' => 'nullable|string|max:100',
            'nilai_pembibing_industri' => 'nullable|numeric',
            'dokument_nilai_industri' => 'nullable|file|mimes:pdf,doc,docx',
            'dokument_pkl' => 'nullable|file|mimes:pdf,doc,docx',
            'dokument_pkl_revisi' => 'nullable|file|mimes:pdf,doc,docx',
            'dokument_kuisioner' => 'nullable|file|mimes:pdf,doc,docx',
            'tgl_sidang' => 'nullable|date',
            'rekomendasi' => 'nullable|string|max:12',
            'informasi_detail' => 'nullable|string',
        ]);

        $data = $request->all();

        // Define the document input names and their respective storage paths
        $documents = [
            'dokument_nilai_industri' => 'dokumen_pkl',
            'dokument_pkl' => 'dokumen_pkl',
            'dokument_pkl_revisi' => 'dokumen_pkl',
            'dokument_kuisioner' => 'dokumen_pkl',
        ];

        foreach ($documents as $inputName => $folder) {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs("public/{$folder}", $filename);
                $data[$inputName] = str_replace('public/', '', $path);
            }
        }
        Mhs_Pkl::create($data);

        return redirect()->route('mhs_pkl.index')->with('success', 'Data Mahasiswa PKL berhasil disimpan!');
    }

    public function showTentukanPembimbingForm($id)
    {
        $pkl = Mhs_Pkl::findOrFail($id);
        $bidangs = bidang::with('dosens')->get();
        return view('mhs_pkl.pembimbing', compact('pkl','bidangs'));
    }
    public function getDosenByBidang($id_bidang)
    {
        $dosens = Dosen::where('id_bidang', $id_bidang)->get(['id_dosen', 'nama']);
        return response()->json($dosens);
    }public function tentukanPembimbing(Request $request, $id)
    {
        $validated = $request->validate([
            'keterangan' => 'nullable|string',
            'dosen_pembimbing' => 'nullable|exists:dosens,id_dosen',
        ]);
        $mhsPkl = Mhs_pkl::findOrFail($id);
        if (isset($validated['dosen_pembimbing'])) {
            $mhsPkl->dosen_pembimbing = $validated['dosen_pembimbing'];
        }
/*
        if (isset($validated['keterangan'])) {
            $mhsPkl->keterangan = $validated['keterangan'];
        } */
        $mhsPkl->save();
        return redirect()->route('mhs_pkl.index')
            ->with('success', 'Pembimbing telah ditentukan!');
    }

    public function show($id)
    {
        $mhsPkl = Mhs_Pkl::with(['mahasiswa', 'ruangan', 'tempatPkl', 'dosenPembimbing', 'dosenPenguji'])
                        ->findOrFail($id);

        return view('mhs_pkl.show', compact('mhsPkl'));
    }

    // Menampilkan form untuk mengedit data Mahasiswa PKL
    public function edit($id)
    {
        $mhsPkl = Mhs_Pkl::findOrFail($id);
        $mahasiswa = Mhs::all();
        $ruangans = Ruangan::all();
        $tempatPkl = Tempat_Pkl::all();
        $dosens = Dosen::all();

        return view('mhs_pkl.edit', compact('mhsPkl', 'mahasiswa', 'ruangans', 'tempatPkl', 'dosens'));
    }

    // Menyimpan perubahan data Mahasiswa PKL
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mhs' => 'required|exists:mhs,id_mhs',
            'judul' => 'nullable|string|max:255',
            'id_tmpt_pkl' => 'nullable|exists:tempat_pkl,id_tmpt_pkl',
            'tahun_pkl' => 'nullable|date_format:Y',
            'dosen_pembimbing' => 'nullable|exists:dosens,id_dosen',
            'nilai_pembibing_industri' => 'nullable|numeric',
            'dokument_nilai_industri' => 'nullable|file|mimes:pdf,doc,docx',
            'dokument_pkl' => 'nullable|file|mimes:pdf,doc,docx',
            'dokument_pkl_revisi' => 'nullable|file|mimes:pdf,doc,docx',
            'dokument_kuisioner' => 'nullable|file|mimes:pdf,doc,docx',
            'rekomendasi' => 'nullable|string|max:12',
            'informasi_detail' => 'nullable|string',
        ]);

        $mhsPkl = Mhs_Pkl::findOrFail($id);
        $data = $request->all();

        $documents = [
            'dokument_nilai_industri' => 'dokumen_pkl',
            'dokument_pkl' => 'dokumen_pkl',
            'dokument_pkl_revisi' => 'dokumen_pkl',
            'dokument_kuisioner' => 'dokumen_pkl',
        ];

        foreach ($documents as $inputName => $folder) {
            if ($request->hasFile($inputName)) {
                if ($mhsPkl->$inputName && Storage::exists($mhsPkl->$inputName)) {
                    Storage::delete($mhsPkl->$inputName);
                }
                $file = $request->file($inputName);
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs("public/{$folder}", $filename);
                $data[$inputName] = str_replace('public/', '', $path);
            }
        }
        $mhsPkl->update($data);
        return redirect()->route('mhs_pkl.index')->with('success', 'Data Mahasiswa PKL berhasil diupdate!');
    }


    public function showTentukanPenjadwalanForm(mhs_pkl $pkl,$id)
    {
        $pkl = mhs_pkl::find($id);
        $dosens = Dosen::all();
        $ruangans = Ruangan::all();
        $bidangs = bidang::with('dosens')->get();

        return view('mhs_pkl.penjadwalan', compact('bidangs', 'pkl', 'dosens', 'ruangans'));
    }

    public function tentukanPenjadwalan(Request $request, $id)
    {
        $request->validate([
            'dosen_penguji' => 'nullable|exists:dosens,id_dosen',
            'pembimbing_pkl' => 'nullable|string|max:100',
            'ruang_sidang' => 'nullable|exists:ruangans,id_ruangan',
            'tgl_sidang' => 'nullable|date',
        ]);

        $existingSchedule = mhs_pkl::where('ruang_sidang', $request->ruang_sidang)
            ->where('tgl_sidang', $request->tgl_sidang)
            ->first();

        if ($existingSchedule) {
            return redirect()->route('mhs_pkl.index')->with('error', 'Ruangan sudah digunakan pada tanggal dan sesi yang dipilih.');
        }
        $pkl = mhs_pkl::find($id);
        if ($pkl) {
            $pkl->dosen_penguji = $request->dosen_penguji;
            $pkl->pembimbing_pkl = $request->pembimbing_pkl;
            $pkl->ruang_sidang = $request->ruang_sidang;
            $pkl->tgl_sidang = $request->tgl_sidang;
            $pkl->save();

        return redirect()->route('mhs_pkl.index')->with('succes', 'Sidang Pkl berhasil dijadwalkan!');
        }
    }

    public function destroy($id)
    {
        $mhsPkl = Mhs_Pkl::findOrFail($id);

        // Menghapus file terkait jika ada
        if ($mhsPkl->dokument_nilai_industri) {
            Storage::delete($mhsPkl->dokument_nilai_industri);
        }
        if ($mhsPkl->dokument_pkl) {
            Storage::delete($mhsPkl->dokument_pkl);
        }
        if ($mhsPkl->dokument_pkl_revisi) {
            Storage::delete($mhsPkl->dokument_pkl_revisi);
        }
        if ($mhsPkl->dokument_kuisioner) {
            Storage::delete($mhsPkl->dokument_kuisioner);
        }

        $mhsPkl->delete();

        return redirect()->route('mhs_pkl.index')->with('success', 'Data Mahasiswa PKL berhasil dihapus!');
    }
}
