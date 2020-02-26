<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntrianModel extends Model
{
    protected $table = 'tabel_antrian';
    protected $fillable = ['idAnggota', 'idDokter', 'noAntrian', 'tanggal', 'keluhan', 'penyakit', 'obat', 'status', 'created_at', 'updated_at'];
}
