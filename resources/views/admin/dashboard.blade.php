@extends('admin.layout.layout')

@section('content')
  <h2 class="mb-4">Dashboard</h2>  
  <div class="container">
    <div class="row">
      
      <div class="col-md-12 col-xl-4 col-sm-12" style="margin-bottom:10px;">
        <div class="card bg-info text-white">
          <div class="card-header">
            Jumlah Dokter
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>{{ $jumlahDokter }} Dokter</p>
            </blockquote>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-xl-4 col-sm-12" style="margin-bottom:10px;">
        <div class="card bg-info text-white">
          <div class="card-header">
            Penyakit Terdaftar
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>{{ $jumlahPenyakit }} Penyakit</p>
            </blockquote>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-xl-4 col-sm-12" style="margin-bottom:10px;">
        <div class="card bg-info text-white">
          <div class="card-header">
            Jumlah Anggota
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>{{ $jumlahAnggota }} Anggota</p>
            </blockquote>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      
      <div class="col-md-12 col-xl-6 col-sm-12" style="margin-bottom:10px;">
        <div class="card bg-success text-white">
          <div class="card-header">
            Pasien Masuk Hari Ini
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>{{ $pasienMasukToday }} Pasien</p>
            </blockquote>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-xl-6 col-sm-12" style="margin-bottom:10px;">
        <div class="card bg-success text-white">
          <div class="card-header">
            Total Pasien Masuk
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>{{ $pasienMasukAll }} Pasien</p>
            </blockquote>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
      $(document).ready(function(){
          $("#dashboardNav").addClass("active");
          $("#dokterNav").removeClass("active");
          $("#penyakitNav").removeClass("active");
          $("#pasienNav").removeClass("active");
          $("#userNav").removeClass("active");
      });
  </script>
  
@endsection
