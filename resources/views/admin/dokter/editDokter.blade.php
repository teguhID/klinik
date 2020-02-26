@extends('admin.layout.layout')

@section('content')
<h2 class="mb-4">Edit Data Dokter</h2>
@foreach ($data as $datas)
<form action="{{ url('/updateDokter/' . $datas->idDokter) }}" method="POST" autocomplete="off">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="{{ $datas->nama }}">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" cols="30" rows="10">{{ $datas->alamat }}</textarea>
    </div>
    <div class="form-group">
        <label>No STR</label>
        <input type="text" class="form-control" name="str" value="{{ $datas->str }}">
    </div>
    <div class="form-group">
        <label>Kualifikasi</label>
        <input type="text" class="form-control" name="kualifikasi" value="{{ $datas->kualifikasi }}">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select class="form-control" name="jenisKelamin">
            <option value="Pria" @if($datas->jenisKelamin == "Pria") {{"selected"}}
                @endif>Pria</option>
            <option value="Wanita" @if($datas->jenisKelamin == "Wanita") {{"selected"}}
                @endif>Wanita</option>
        </select>
    </div>
    <div class="form-group">
        <label>Universitas</label>
        <input type="text" class="form-control" name="universitas" value="{{ $datas->universitas }}">
    </div>
    <div class="form-group">
        <label>Kontak</label>
        <input type="number" class="form-control" name="kontak" value="{{ $datas->kontak }}">
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endforeach

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
