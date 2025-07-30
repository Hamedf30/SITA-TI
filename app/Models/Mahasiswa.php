<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nobp', 'nama', 'telp', 'alamat', 'prodi_id', 'jurusan_id', 'kelas', 'gambar', 'user_id', 'jekel'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function proposal()
    {
        return $this->hasOne(ProposalTa::class, 'mahasiswa_id');
    }

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class, 'mahasiswa_id');
    }

}
