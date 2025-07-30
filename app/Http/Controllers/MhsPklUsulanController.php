<?php

namespace App\Http\Controllers;

use App\Models\Mhs_Pkl_Usulan;
use App\Models\Mahasiswa;
use App\Models\Tempat_Pkl;
use Illuminate\Http\Request;

class MhsPklUsulanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $user = auth()->user();

        $usulans = Mhs_Pkl_Usulan::with(['mahasiswa', 'tempatPkl'])
            ->where(function ($query) use ($user) {
                if ($user->level->level === 'Mahasiswa') {
                    $query->where('mahasiswa_id', $user->mahasiswa->id);
                } elseif ($user->level->level === 'Kaprodi') {
                }
            })
            ->when($search, function ($query) use ($search) {
                $query->whereHas('mahasiswa', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                })->orWhereHas('tempatPkl', function ($q) use ($search) {
                    $q->where('nama_perusahaan', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10);

        return view('pages.mahasiswa.mhs_pkl_usulan.index', compact('usulans'));
    }

    public function indexForKaprodi(Request $request)
    {
        
    }


    public function create()
    {
        // $mahasiswas = Mahasiswa::all();
        // $tempatPkl = Tempat_Pkl::all();

        // return view('mhs_pkl_usulan.create', compact('mahasiswas', 'tempatPkl'));
        abort(404);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,mahasiswa_id',
            'id_tmpt_pkl' => 'required|exists:tempat_pkl,id_tmpt_pkl',
            'tahun_ajaran' => 'required|string|max:40',
            'konfirmasi' => 'nullable|string',
        ]);

        $validatedData['konfirmasi'] = $validatedData['konfirmasi'] ?? 'Pending';

        $usulan = Mhs_Pkl_Usulan::create($validatedData);

        $tempatPkl = Tempat_Pkl::find($validatedData['id_tmpt_pkl']);
        if ($tempatPkl && $tempatPkl->kuota > 0) {
            $tempatPkl->kuota -= 1;
            $tempatPkl->save();
        }

        return redirect()->route('mhs_pkl_usulan.index')->with('success', 'Usulan PKL berhasil ditambahkan.');
    }

    public function show($id)
    {
        $usulan = Mhs_Pkl_Usulan::with(['mahasiswa', 'tempatPkl'])->findOrFail($id);

        return view('mhs_pkl_usulan.show', compact('usulan'));
    }

    public function edit($id)
    {
        $usulan = Mhs_Pkl_Usulan::findOrFail($id);
        $mahasiswas = Mhs::all();
        $tempatPkl = Tempat_Pkl::all();

        return view('pages.mahasiswa.mhs_pkl_usulan.edit', compact('usulan', 'mahasiswas', 'tempatPkl'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_mhs' => 'required|exists:mhs,id_mhs',
            'id_tmpt_pkl' => 'required|exists:tempat_pkl,id_tmpt_pkl',
            'tahun_ajaran' => 'required|string|max:40',
            'konfirmasi' => 'nullable|string',
        ]);

        $usulan = Mhs_Pkl_Usulan::findOrFail($id);
        $usulan->update($validatedData);

        return redirect()->route('mhs_pkl_usulan.index')->with('success', 'Usulan PKL berhasil diperbarui.');
    }
    public function updateKonfirmasi(Request $request, $id_usulan)
    {
        $usulan = Mhs_Pkl_Usulan::findOrFail($id_usulan);
        $usulan->konfirmasi = $request->konfirmasi;
        $usulan->save();

        return redirect()->route('mhs_pkl_usulan.index')->with('success', 'Status konfirmasi berhasil diperbarui');
    }
        public function destroy($id)
    {
        $usulan = Mhs_Pkl_Usulan::findOrFail($id);
        $usulan->delete();

        return redirect()->route('mhs_pkl_usulan.index')->with('success', 'Usulan PKL berhasil dihapus.');
    }
}
