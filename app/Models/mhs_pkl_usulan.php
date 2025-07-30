<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mhs_pkl_usulan extends Model
{
    use HasFactory;
    protected $table = 'mhs_pkl_usulan';
    protected $primaryKey = 'id_usulan';
    protected $guarded = [
       'id',
    ];

    protected $casts = [
        'konfirmasi' => 'string',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
    public function mhsPkl()
    {
        return $this->belongsTo(mhs_Pkl::class, 'id_pkl', 'id_pkl');
    }
    public function tempatPkl()
    {
        return $this->belongsTo(Tempat_Pkl::class, 'id_tmpt_pkl', 'id_tmpt_pkl');
    }
}
