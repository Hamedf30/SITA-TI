<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $table = 'bimbingan';
    // protected $primaryKey = 'id_bimbingan';
    protected $fillable = [
        'pembahasan',
        'dosen_id',
        'mahasiswa_id',
        'ip',
    ];
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function pem1()
    {
        return $this->hasOne(Pembimbing1::class, 'bimbingan_id');
    }

    public function pem2()
    {
        return $this->hasOne(Pembimbing2::class, 'bimbingan_id');
    }
}
