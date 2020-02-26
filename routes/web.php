<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// User
Route::get('/', 'UserController@index');
Route::get('/pendaftaran', 'UserController@Pendaftaran');
Route::get('/pendaftaranBaru', 'UserController@PendaftaranBaru');
Route::get('/pendaftaranSudahTerdaftar', 'UserController@PendaftaranSudahTerdaftar');
Route::post('/inputAnggota', 'UserController@InputAnggota'); //input anggota baru sekaligus masuk antrian
Route::post('/inputAntrianAnggota', 'UserController@InputAntrianAnggota');
Route::get('/antrian', 'UserController@Antrian');

// Data Autocomplete
Route::get('/listAnggotaAutocomplete', 'UserController@ListAnggotaAutocomplete');

//Admin
Route::get('/admin', function ()
{
    if(auth()->user()->status == "Admin"){
        return redirect('loginAdmin');
    }
    else if(auth()->user()->status == "Dokter"){
        return redirect('loginDokter');
    }
    else if(auth()->user()->status == "Petugas"){
        return redirect('loginPetugas');
    }
    else{
        return 'asd';
    }
});
Route::get('/loginAdmin', 'AdminController@LoginAdmin');
Route::get('/loginDokter', 'AdminController@LoginDokter');
Route::get('/loginPetugas', 'AdminController@LoginPetugas');

//User
Route::get('/user', 'AdminController@User');
Route::get('/getDataUser', 'AdminController@GetDataUser');
Route::post('/insertDataUser', 'AdminController@InsertDataUser');
Route::post('/updateDataUser/{id}', 'AdminController@UpdateDataUser');
Route::post('/deleteDataUser/{id}', 'AdminController@DeleteDataUser');

//Pemyakit
Route::get('/penyakit', 'AdminController@Penyakit');
Route::get('/getDataPenyakit', 'AdminController@GetDataPenyakit');
Route::post('/insertDataPenyakit', 'AdminController@InsertDataPenyakit');
Route::post('/updateDataPenyakit/{id}', 'AdminController@UpdateDataPenyakit');
Route::post('/deleteDataPenyakit/{id}', 'AdminController@DeleteDataPenyakit');

//Pasien
Route::get('/pasien', 'AdminController@Pasien');
Route::get('/getDataPasien', 'AdminController@GetDataPasien');
Route::post('/insertDataPasien', 'AdminController@InsertDataPasien');
Route::post('/updateDataPasien/{id}', 'AdminController@UpdateDataPasien');
Route::post('/deleteDataPasien/{id}', 'AdminController@DeleteDataPasien');

//Data Dokter di Halaman Admin
Route::get('/dokter', 'AdminController@DataDokter');
Route::get('/tambahDokter', 'AdminController@TambahDokter');
Route::post('/tambahDataDokter', 'AdminController@TambahDataDokter');
Route::get('/editDokter/{idDokter}', 'AdminController@EditDokter');
Route::post('/updateDokter/{idDokter}', 'AdminController@UpdateDokter');
Route::get('/detailDokter/{idDokter}', 'AdminController@DetailDokter');
Route::post('/deleteDokter/{idDokter}', 'AdminController@DeleteDokter');
Route::get('/statusDokter/{idDokter}', 'AdminController@StatusDokter');

//AntrianPasien
Route::get('/prosesPengobatan/{idAnggota}', 'AdminController@ProsesPengobatan');
Route::get('/inputObat/{idAntrian}', 'AdminController@InputObat');
Route::post('/selesaiBerobat/{idAntrian}', 'AdminController@SelesaiBerobat');
