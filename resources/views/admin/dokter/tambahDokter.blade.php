@extends('admin.layout.layout')

@section('content')
<h2 class="mb-4">Tambah Data Dokter</h2>
<form action="{{ url('/tambahDataDokter') }}" method="POST" autocomplete="off">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>No STR</label>
        <input type="text" class="form-control" name="str">
    </div>
    <div class="form-group">
        <label>Kualifikasi</label>
        <input type="text" class="form-control" name="kualifikasi">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select class="form-control" name="jenisKelamin">
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
    </div>
    <div class="form-group">
        <label>Universitas</label>
        <input type="text" class="form-control" name="universitas">
    </div>
    <div class="form-group">
        <label>Kontak</label>
        <input type="number" class="form-control" name="kontak">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>


<script>
    $(document).ready(function(){
        $("#dashboardNav").removeClass("active");
        $("#dokterNav").addClass("active");
        $("#penyakitNav").removeClass("active");
        $("#pasienNav").removeClass("active");
        $("#userNav").removeClass("active");
    });
</script>

@endsection
