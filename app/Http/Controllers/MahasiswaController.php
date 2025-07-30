<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Kaprodi;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();
        $jurusan = Jurusan::orderBy('nama_jurusan', 'asc')->get();
        $mahasiswa = Mahasiswa::OrderBy('nama', 'asc')->get();
        return view('pages.admin.mahasiswa.index', compact('mahasiswa', 'prodi', 'jurusan'));
    }

    public function indexKaprodi()
    {
        // Retrieve the Kaprodi based on the authenticated user's ID
        $kaprodi = Kaprodi::where('user_id', Auth::id())->first();

        // Get the prodi_id of the authenticated Kaprodi
        $prodi_id = $kaprodi->prodi_id;

        // Retrieve the Prodi and Mahasiswa data, filtering Mahasiswa by the prodi_id
        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();
        $mahasiswa = Mahasiswa::where('prodi_id', $prodi_id)->orderBy('nama', 'asc')->get();

        // Pass the filtered Mahasiswa and Prodi data to the view
        return view('pages.kaprodi.mahasiswa.index', compact('mahasiswa', 'prodi'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nobp' => 'required|unique:mahasiswas',
            'telp' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required',
            'jurusan_id' => 'required',
            'kelas' => 'required',
            'jekel' => 'required|in:pria,wanita',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nobp.unique' => 'NOBP sudah terdaftar',
        ]);


        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nobp = $request->nobp;
        $mahasiswa->telp = $request->telp;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->prodi_id = $request->prodi_id;
        $mahasiswa->jurusan_id = $request->jurusan_id;
        $mahasiswa->jekel = $request->jekel;
        $mahasiswa->kelas = $request->kelas;
        // Proses unggah gambar
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('gambar/mahasiswa'), $imageName);
             $validation['gambar'] = $imageName;
        }

        // if ($request->hasFile('gambar')) {
        //     $gambar = $request->file('gambar');
        //     $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        //     $gambar->move(public_path('images/mahasiswa'), $gambarName);
        //     $mahasiswa->gambar = $gambarName;
        // }
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('pages.admin.mahasiswa.profile', compact('mahasiswa'));
    }

    public function showKaprodi($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('pages.kaprodi.mahasiswa.profile', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $prodi = Prodi::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('pages.admin.mahasiswa.edit', compact('mahasiswa', 'prodi', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {

        $mahasiswa->nama = $request->nama;
        $mahasiswa->nobp = $request->nobp;
        $mahasiswa->telp = $request->telp;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->prodi_id = $request->prodi_id;
        $mahasiswa->jurusan_id = $request->jurusan_id;
        $mahasiswa->jekel = $request->jekel;
        $mahasiswa->kelas = $request->kelas;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($mahasiswa->gambar) {
                Storage::disk('public')->delete($mahasiswa->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('mahasiswa', 'public');
        }
        $mahasiswa->update();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }

    public function export_mahasiswa()
    {
        try {
            return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengekspor data: ' . $th->getMessage());
        }
    }

    public function import_mahasiswa(Request $request)
    {
        // Validate incoming request data
        $request->validate
        ([
                'file' => 'required|max:2048',
            ]);

        Excel::import(new MahasiswaImport, $request->file('file'));

        return back()->with('success', 'Import data mahasiswa berhasil !');
    }
}
