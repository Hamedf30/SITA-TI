<?php

namespace App\Http\Controllers;

use App\Models\Tempat_Pkl;
use Illuminate\Http\Request;

class TempatPklController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $tempatPkl = Tempat_Pkl::when($search, function ($query) use ($search) {
            return $query->where('nama_perusahaan', 'like', "%{$search}%");
        })->paginate(10);

        return view('pages.kaprodi.tempat_pkl.index', compact('tempatPkl'));
    }
    public function create()
    {
        // return view('pages.kaprodi.tempat_pkl.create');
        abort(404);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'info_pkl' => 'required|string|max:1000',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);
        Tempat_Pkl::create($validated);
        return redirect()->route('tempat_pkl.index')->with('success', 'Tempat PKL berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $tempatPkl = Tempat_Pkl::findOrFail($id);
        return view('pages.kaprodi.tempat_pkl.edit', compact('tempatPkl'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'info_pkl' => 'required|string|max:1000',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);
        $tempatPkl = Tempat_Pkl::findOrFail($id);
        $tempatPkl->update($validated);
        return redirect()->route('tempat_pkl.index')->with('success', 'Tempat PKL berhasil diperbarui.');
    }
    public function show($id)
    {
        $tempatPkl = Tempat_Pkl::findOrFail($id);
        return view('tempat_pkl.show', compact('tempatPkl'));
    }
    public function destroy($id)
    {
        $tempatPkl = Tempat_Pkl::findOrFail($id);
        $tempatPkl->delete();
        return redirect()->route('tempat_pkl.index')->with('success', 'Tempat PKL berhasil dihapus.');
    }
}
