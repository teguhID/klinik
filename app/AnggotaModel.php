<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    protected $table = 'tabel_anggota';
    protected $fillable = ['namaAnggota', 'ktp', 'usia', 'alamat', 'created_at', 'updated_at'];
}
