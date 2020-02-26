@extends('user.layout.layout')

@section('content')
    
<style>
    .box-animation{
        transition: transform .5s;
        background-color: #27ae60;
    }
    .box-animation:hover{
        -ms-transform: scale(1.05); /* IE 9 */
        -webkit-transform: scale(1.05); /* Safari 3-8 */
        transform: scale(1.05); 
        background-color: #2ecc71;
    }
</style>

<section class="text-center d-flex clean-block about-us" style="padding-bottom: 100px;padding-top: 150px;">
    <div class="container d-xl-flex justify-content-xl-center align-items-xl-center">
        <div class="row d-xl-flex justify-content-xl-center">
            <div class="col-lg-6 col-sm-12" style="padding-bottom: 10px;">
                <a href="{{ url('/pendaftaranBaru') }}">
                    <div class="card">
                        <div class="card-body box-animation">
                            <div class="icons" style="padding: 10px;"><i class="fas fa-user-plus" style="color: rgb(255,255,255);font-size: 80px;"></i></div>
                            <h4 class="card-title" style="color: rgb(255,255,255);"><strong>Pasien Baru</strong></h4>
                            <hr style="color: rgb(255,255,255);background-color: rgba(0,0,0,0);margin-top: 0px;margin-bottom: 10px;">
                            <p class="card-text" style="color: rgb(255,255,255);font-size: 13px;font-family: Montserrat, sans-serif;">Untuk pasien yang baru pertama <br>berobat</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-sm-12" style="padding-bottom: 10px;">
                <a href="{{ url('/pendaftaranSudahTerdaftar') }}">
                    <div class="card">
                        <div class="card-body box-animation">
                            <div class="icons" style="padding: 10px;"><i class="fa fa-user-circle" style="color: rgb(255,255,255);font-size: 80px;"></i></div>
                            <h4 class="card-title" style="color: rgb(255,255,255);"><strong>Anggota</strong></h4>
                            <hr style="color: rgb(255,255,255);background-color: rgba(0,0,0,0);margin-top: 0px;margin-bottom: 10px;">
                            <p class="card-text" style="color: rgb(255,255,255);font-size: 13px;font-family: Montserrat, sans-serif;">Untuk pasien yang sudah pernah terdaftar</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
