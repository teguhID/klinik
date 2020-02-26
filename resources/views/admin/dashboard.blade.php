@extends('admin.layout.layout')

@section('content')
  <h2 class="mb-4">Dashboard</h2>
  <p>data dokter</p>
  <p>data penyakit</p>
  <p>data passien terdaftar</p>
  <p>data histori pengobatan</p>
  <p>data pengobatan hari ini</p>
  

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
