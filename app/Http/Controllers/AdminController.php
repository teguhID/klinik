<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DokterModel;
use App\User;
use App\PenyakitModel;
use App\AnggotaModel;
use App\AntrianModel;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ================================== LOGIN AUTH ================================== //
    public function LoginAdmin()
    {
        $jumlahDokter = DokterModel::all()->count();
        $jumlahPenyakit = PenyakitModel::all()->count();
        $jumlahAnggota = AnggotaModel::all()->count();
        $pasienMasukToday = AntrianModel::whereDate('created_at', date('Y-m-d'))->get()->count();
        $pasienMasukAll = AntrianModel::all()->count();
        $data = [
            'jumlahDokter'  => $jumlahDokter,
            'jumlahPenyakit'   => $jumlahPenyakit,
            'jumlahAnggota'  => $jumlahAnggota,
            'pasienMasukToday'   => $pasienMasukToday,
            'pasienMasukAll'   => $pasienMasukAll,
        ];
        return view('admin.dashboard')->with($data);
    }

    public function LoginDokter()
    {
        $date = date("Y-m-d");
        $data = DB::table('tabel_antrian')->join('tabel_anggota', 'tabel_antrian.idAnggota', '=', 'tabel_anggota.idAnggota')
                                          ->join('tabel_dokter', 'tabel_antrian.idDokter', '=', 'tabel_dokter.idDokter')
                                          ->select('tabel_antrian.*', 'tabel_anggota.*', 'tabel_dokter.nama')
                                          ->whereDate('tabel_antrian.created_at', '=', $date)
                                          ->where('tabel_antrian.status', 'dalam proses pengobatan')
                                          ->get();
        $penyakit = PenyakitModel::all();

        $passData = [
            'data'  => $data,
            'penyakit'   => $penyakit,
        ];
        return view('dokter.dashboard')->with($passData);
    }

    public function LoginPetugas()
    {
        $date = date("Y-m-d");
        $data = DB::table('tabel_antrian')->join('tabel_anggota', 'tabel_antrian.idAnggota', '=', 'tabel_anggota.idAnggota')
                                          ->join('tabel_dokter', 'tabel_antrian.idDokter', '=', 'tabel_dokter.idDokter')
                                          ->select('tabel_antrian.*', 'tabel_anggota.*', 'tabel_dokter.nama')
                                          ->whereDate('tabel_antrian.created_at', '=', $date)
                                          ->where('tabel_antrian.status', 'dalam antrian')
                                          ->orWhere('tabel_antrian.status', 'selesai berobat')
                                          ->get();
        $penyakit = PenyakitModel::all();

        $passData = [
            'data'  => $data,
            'penyakit'   => $penyakit,
        ];
        return view('petugas.dashboard')->with($passData);
    }
    // ================================== LOGIN AUTH ================================== //

    // ================================== DOKTER ================================== //
    public function DataDokter()
    {
        $data = DokterModel::all();
        return view('admin.dokter.dataDokter')->with('data', $data);
    }

    public function TambahDokter()
    {
        return view('admin.dokter.tambahDokter');
    }

    public function TambahDataDokter(Request $req)
    {
        DokterModel::create($req->all());
        return redirect('/dokter');
    }

    public function EditDokter($idDokter)
    {
        $data = DokterModel::where('idDokter', $idDokter)->get();
        return view('admin.dokter.editDokter')->with('data', $data);
    }

    public function UpdateDokter($idDokter, Request $req)
    {
        DokterModel::where('idDokter', $idDokter)->update($req->except(['_method', '_token']));
        return redirect('/dokter');
    }

    public function DetailDokter($idDokter)
    {
        $data = DokterModel::where('idDokter', $idDokter)->get();
        return view('admin.dokter.detailDokter')->with('data', $data);
    }

    public function DeleteDokter($idDokter)
    {
        DokterModel::where('idDokter', $idDokter)->delete();
        return redirect('/dokter');
    }

    public function StatusDokter($idDokter)
    {
        $status = DokterModel::where('idDokter', $idDokter)->get();
        foreach ($status as $data) {
            if ($data->status == "hadir") {
                DokterModel::where('idDokter', $idDokter)->update(['status' => 'tidak hadir']);
                return redirect('/dokter');
            } else {
                DokterModel::where('idDokter', $idDokter)->update(['status' => 'hadir']);
                return redirect('/dokter');
            }
        }
    }
    // ================================== DOKTER ================================== //

    // ================================== USER ================================== //
    public function User()
    {
        $data = User::all();
        return view('admin.user.user');
    }
    public function GetDataUser()
    {
        $data = User::all();
        return json_encode($data);
    }
    public function InsertDataUser(Request $req)
    {
        User::create([
            'name' => $req->name,
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'status' => $req->status,
        ]);
        return 'ok';
    }
    public function UpdateDataUser($id, Request $req)
    {
        User::where('id', $id)->update([
            'name' => $req->name,
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'status' => $req->status,
        ]);
        return 'ok';
    }
    public function DeleteDataUser($id)
    {
        // return $id;
        User::where('id', $id)->delete();
        return 'ok';
    }
    // ================================== USER ================================== //

    // ================================== Penyakit ================================== //
    public function Penyakit()
    {
        $data = PenyakitModel::all();
        return view('admin.penyakit.penyakit');
    }
    public function GetDataPenyakit()
    {
        $data = PenyakitModel::all();
        return json_encode($data);
    }
    public function InsertDataPenyakit(Request $req)
    {
        PenyakitModel::create($req->all());
        return 'ok';
    }
    public function UpdateDataPenyakit($id, Request $req)
    {
        PenyakitModel::where('id', $id)->update($req->all());
        return 'ok';
    }
    public function DeleteDataPenyakit($id)
    {
        PenyakitModel::where('id', $id)->delete();
        return 'ok';
    }
    // ================================== Penyakit ================================== //

    // ================================== Pasien ================================== //
    public function Pasien()
    {
        $data = AnggotaModel::all();
        return view('admin.pasien.pasien');
    }
    public function GetDataPasien()
    {
        $data = AnggotaModel::all();
        return json_encode($data);
    }
    public function InsertDataPasien(Request $req)
    {
        AnggotaModel::create($req->all());
        return 'ok';
    }
    public function UpdateDataPasien($id, Request $req)
    {
        AnggotaModel::where('idAnggota', $id)->update($req->all());
        return 'ok';
    }
    public function DeleteDataPasien($id)
    {
        AnggotaModel::where('idAnggota', $id)->delete();
        return 'ok';
    }
    // ================================== Pasien ================================== //

    // ================================== Antrian Pasien ================================== //
    
    public function ProsesPengobatan($idAntrian)
    {
        AntrianModel::where('idAntrian', $idAntrian)->update(['status'=>'dalam proses pengobatan']);
        return redirect('admin');
    }
    public function InputObat($idAntrian)
    {
        $penyakit = PenyakitModel::all();
        $data = DB::table('tabel_antrian')->join('tabel_anggota', 'tabel_antrian.idAnggota', '=', 'tabel_anggota.idAnggota')
                                          ->join('tabel_dokter', 'tabel_antrian.idDokter', '=', 'tabel_dokter.idDokter')
                                          ->select('tabel_antrian.*', 'tabel_anggota.*', 'tabel_dokter.nama')
                                          ->where('tabel_antrian.idAntrian', $idAntrian)
                                          ->get();
        $passData = [
            'data'  => $data,
            'penyakit'   => $penyakit,
        ];
        return view('dokter.inputObat')->with($passData);
    }

    public function SelesaiBerobat($idAntrian, Request $req)
    {
        AntrianModel::where('idAntrian', $idAntrian)->update([
            'obat' => $req->obat,
            'penyakit' => $req->penyakit,
            'status' => 'selesai berobat',
        ]);
        return redirect('/loginDokter');
    }

}
