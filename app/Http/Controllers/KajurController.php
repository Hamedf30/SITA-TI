<?php

namespace App\Http\Controllers;

use App\Models\Kajur;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class KajurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::orderBy('nama_jurusan', 'asc')->get();
        $kajur = Kajur::orderBy('nama', 'asc')->get();
        return view('pages.admin.kajur.index', compact('kajur', 'jurusan'));
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
            'nidn' => 'required|unique:kaprodis',
            'no_telp' => 'required',
            'alamat' => 'required',
            'jurusan_id' => 'required',
            'jekel' => 'required|in:pria,wanita',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nidn.unique' => 'nidn sudah terdaftar',
        ]);

        $kajur = new Kajur;
        $kajur->nama = $request->nama;
        $kajur->nidn = $request->nidn;
        $kajur->no_telp = $request->no_telp;
        $kajur->alamat = $request->alamat;
        $kajur->jurusan_id = $request->jurusan_id;
        $kajur->jekel = $request->jekel;
        // Proses unggah gambar
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kajur', 'public');
        }
        $kajur->save();


        return redirect()->route('kajur.index')->with('success', 'Data Ketua Jurusan berhasil ditambahkan');
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
        $kajur = Kajur::findOrFail($id);

        return view('pages.admin.kajur.profile', compact('kajur'));
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
        $jurusan = Jurusan::all();
        $kajur = Kajur::findOrFail($id);

        return view('pages.admin.kajur.edit', compact('kajur', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kajur = Kajur::find($id);
        $kajur->nama = $request->input('nama');
        $kajur->nidn = $request->input('nidn');
        $kajur->no_telp = $request->input('no_telp');
        $kajur->alamat = $request->input('alamat');
        $kajur->jurusan_id = $request->input('jurusan_id');
        $kajur->jekel = $request->jekel;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($kajur->gambar) {
                Storage::disk('public')->delete($kajur->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('kajur', 'public');
        }
        $kajur->update();

        return redirect()->route('kajur.index')->with('success', 'Data ketua jurusan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kajur = Kajur::find($id);
        $kajur->delete();

        // Hapus data user
        if ($user = User::where('id', $kajur->user_id)->first()) {
            $user->delete();
        }

        return back()->with('success', 'Data ketua jurusan berhasil dihapus!');
    }
}
