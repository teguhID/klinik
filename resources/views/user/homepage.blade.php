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

<section class="clean-block clean-hero" style="background-image: url(&quot;{{asset('')}}img/klinik.jpg&quot;);color: rgba(0,0,0,0.7);">
    <div class="text"><img src="{{asset('')}}img/logo.png" style="padding: 10px;">
        <p style="font-size: 16px;">hadir untuk turut berperan serta aktif dalam membangun manusia yang sehat seutuhnya. Adalah kebahagiaan kami dari Klinik A24 untuk dapat melayani anda semua dalam bidang kesehatan.</p>
    </div>
</section>
<section class="text-center d-flex clean-block about-us" style="padding-bottom: 50px;padding-top: 100px;">
    <div class="container d-xl-flex justify-content-xl-center align-items-xl-center">
        <div class="row d-xl-flex justify-content-xl-center">
            <div class="col-lg-4 col-sm-12" style="padding-bottom: 10px;">
                <a href="{{ url('/pendaftaran') }}">
                    <div class="card">
                        <div class="card-body box-animation">
                            <div class="icons" style="padding: 10px;"><i class="fa fa-user-plus" style="color: rgb(255,255,255);font-size: 80px;"></i></div>
                            <h4 class="card-title" style="color: rgb(255,255,255);"><strong>Pendaftaran Online</strong></h4>
                            <hr style="color: rgb(255,255,255);background-color: rgba(0,0,0,0);margin-top: 0px;margin-bottom: 10px;">
                            <p class="card-text" style="color: rgb(255,255,255);font-size: 13px;font-family: Montserrat, sans-serif;">Pendaftaran online bagi para pasien untuk mendapatkan&nbsp; nomor antrian</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-12" style="padding-bottom: 10px;">
                <a href="{{ url('/antrian') }}">
                    <div class="card">
                        <div class="card-body box-animation">
                            <div class="icons" style="padding: 10px;"><i class="fa fa-list" style="color: rgb(255,255,255);font-size: 80px;"></i></div>
                            <h4 class="card-title" style="color: rgb(255,255,255);"><strong>Daftar Antrian</strong></h4>
                            <hr style="color: rgb(255,255,255);background-color: rgba(0,0,0,0);margin-top: 0px;margin-bottom: 10px;">
                            <p class="card-text" style="color: rgb(255,255,255);font-size: 13px;font-family: Montserrat, sans-serif;">Informasi tentang antrian yang sudah masuk bagi para pasien klinik</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="clean-block features">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">Nilai Nilai</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5 feature-box"><i class="far fa-smile icon"></i>
                <h4>Care</h4>
                <p>Kami melayani pasien melalui pelayanan yang responsif, terpadu, nyaman, komunikasi yang baik, mengerti masalah pasien, memberikan pelayanan dan saran yang terbaik, menolong pasien secara menyeluruh, membuat pasien merasa aman seperti
                    dilayani keluarga sendiri.</p>
            </div>
            <div class="col-md-5 feature-box"><i class="fas fa-info-circle icon"></i>
                <h4>Quality orientation</h4>
                <p>Kami mengadopsi manajemen kualitas sebagai filosofi utama dalam apapun yang kami lakukan dan menekankan pada budaya pengembangan kualitas secara menyeluruh atau terintegrasi yang diwujudkan dengan tenaga medis dan pendukung yang
                    terlatih dan dikembangkan dari waktu ke waktu dengan dukungan peralatan yang modern.</p>
            </div>
            <div class="col-md-5 feature-box"><i class="fa fa-handshake-o icon"></i>
                <h4>Team work</h4>
                <p>Kami bekerja sama antar bagian dan tim dengan niat tulus, merasa menjadi bagian dari sebuah tim, saling mendukung untuk tujuan terbaik untuk klinik dan pasien serta komunitas pendukungnya. Kerjasama dengan pemasok, rumah sakit
                    lanjutan dan juga regulator akan ditingkatkan secara professional untuk kepentingan pasien, keluarga pasien dan karyawan klinik.</p>
            </div>
            <div class="col-md-5 feature-box"><i class="fas fa-book-open icon"></i>
                <h4>Continuous learning</h4>
                <p>Kami memiliki kemauan untuk terus belajar secara teratur dengan menciptakan dan memanfaatkan kesempatan untuk belajar, dan menggunakan pengetahuan dan keterampilan baru yang diperoleh dalam pekerjaan dan pembelajaran melalui penerapannya
                    didalam pekerjaan dan tim terkait sehingga dapat meningkatkan kinerja tim dan klinik secara cepat dan signifikan.</p>
            </div>
        </div>
    </div>
</section>

@endsection
