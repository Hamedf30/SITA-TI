<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kajur extends Model
{
    protected $fillable = ['nidn', 'nama', 'jurusan_id', 'no_telp', 'alamat', 'gambar', 'user_id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
