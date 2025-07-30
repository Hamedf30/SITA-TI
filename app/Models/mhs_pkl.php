<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mhs_pkl extends Model
{
    use HasFactory;

    protected $table = 'mhs_pkl';
    protected $primaryKey = 'id_pkl';
    public $timestamps = false;

    protected $guarded = [
       'id'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

    public function tempatPkl()
    {
        return $this->belongsTo(Tempat_Pkl::class, 'id_tmpt_pkl', 'id_tmpt_pkl');
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruang_sidang', 'ruangan_id');
    }

    public function dosenPembimbing()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing', 'id');
    }

    public function dosenPenguji()
    {
        return $this->belongsTo(Dosen::class, 'dosen_penguji', 'id');
    }

}
