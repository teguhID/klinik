<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DokterModel;
use App\AnggotaModel;
use App\AntrianModel;
use DB;

class UserController extends Controller
{
    public function index()
    {
        return view('user.homepage');
    }

    public function Pendaftaran()
    {
        return view('user.pendaftaran');
    }

    public function PendaftaranBaru()
    {
        $data = DokterModel::all();
        return view('user.pendaftaranBaru')->with('data', $data);
    }

    public function PendaftaranSudahTerdaftar()
    {
        $dataDokter = DokterModel::where('status', 'hadir')->get();
        return view('user.pendaftaranSudahTerdaftar')->with('data', $dataDokter);
    }
   
    // ================================== AUTOCOMPLETE ================================== //
    public function ListAnggotaAutocomplete(Request $req)
    {
        if ($req->has('q')) {
            $cari = $req->q;
            $data = AnggotaModel::where('idAnggota', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
    // ================================== AUTOCOMPLETE ================================== //

    // ================================== ANGGOTA ================================== //
    public function InputAnggota(Request $req)
    {
        AnggotaModel::create([  "namaAnggota" => $req->namaAnggota,
                                "ktp" => $req->ktp,
                                "usia" => $req->usia,
                                "alamat" => $req->alamat]);
        //Otomatis masuk antrian
        $idAnggota = AnggotaModel::latest()->first()->idAnggota;
        $date = date("Y-m-d");
        $antrian = AntrianModel::select('noAntrian')->whereDate('created_at', '=', date("Y-m-d"))->latest()->first();
        $noAntrian = 0;
        if($antrian == null)
        {
            $noAntrian = 1;
        }
        else
        {
            $noAntrian = $antrian->noAntrian + 1;
        }
        AntrianModel::create([  "idAnggota" => $idAnggota,
                                "idDokter" => $req->idDokter,
                                "keluhan" => $req->keluhan,
                                "noAntrian" => $noAntrian,
                                "status" => 'dalam antrian',]);
        return redirect('/antrian');
    }

    public function InputAntrianAnggota(Request $req)
    {
        $antrian = AntrianModel::select('noAntrian')->whereDate('created_at', '=', date("Y-m-d"))->latest()->first();
        $noAntrian = 0;
        if($antrian == null)
        {
            $noAntrian = 1;
        }
        else
        {
            $noAntrian = $antrian->noAntrian + 1;
        }
        AntrianModel::create([  "idAnggota" => $req->idAnggota,
                                "idDokter" => $req->idDokter,
                                "keluhan" => $req->keluhan,
                                "noAntrian" => $noAntrian,
                                "status" => 'dalam antrian',]);
        return redirect('/antrian');
    }
    // ================================== ANGGOTA ================================== //

    // ================================== ANTRIAN ================================== //

    public function Antrian()
    {
        $date = date("Y-m-d");
        $data = DB::table('tabel_antrian')->join('tabel_anggota', 'tabel_antrian.idAnggota', '=', 'tabel_anggota.idAnggota')
                                          ->join('tabel_dokter', 'tabel_antrian.idDokter', '=', 'tabel_dokter.idDokter')
                                          ->select('tabel_antrian.*', 'tabel_anggota.*', 'tabel_dokter.nama')
                                          ->whereDate('tabel_antrian.created_at', '=', $date)
                                          ->get();
        return view('user.antrian')->with('data', $data);
    }

    // ================================== ANTRIAN ================================== //

}
