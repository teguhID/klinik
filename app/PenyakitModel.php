<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyakitModel extends Model
{
    protected $table = 'tabel_penyakit';
    protected $fillable = ['nama', 'deskripsi', 'created_at', 'updated_at'];
}