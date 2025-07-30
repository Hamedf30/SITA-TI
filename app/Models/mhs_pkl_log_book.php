<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mhs_pkl_log_book extends Model
{
    use HasFactory;
    protected $table = 'mhs_pkl_log_books';
    protected $primaryKey = 'id_log_book';
    protected $guarded = [
        'id'
    ];

    public $timestamps = true;


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
    public function pkl()
    {
        return $this->belongsTo(Mhs_Pkl::class, 'id_pkl', 'id_pkl');
    }
}
