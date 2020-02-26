<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokterModel extends Model
{
    protected $table = 'tabel_dokter';
    protected $fillable = ['nama', 'foto', 'str', 'kualifikasi', 'jenisKelamin', 'tempatPraktek', 'universitas', 'kontak', 'alamat', 'created_at', 'updated_at'];
}
