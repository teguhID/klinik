@extends('admin.layout.layout')

@section('content')
    <h2 class="mb-4">Input Obat & Penyakit
        <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#inputAntrianModal">Tambah Antrian</a>
    </h2>
    <form action="{{ url('/selesaiPengobatan/' . ) }}" method="POST">
        @csrf
        <div class="modal-header">
            <h5>Input Obat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" class="form-control" id="idEdit" name="id">
            <div class="form-group">
                <label>id Anggota</label>
                <input type="text" class="form-control" id="idAnggota" disabled>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" disabled>
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                    <textarea class="form-control" id="keluhan" cols="30" rows="10"></textarea>
                </div>
            <div class="form-group">
            <div class="form-group">
                <label>Obat</label>
                    <input type="text" class="form-control" id="obat">
                </div>
            <div class="form-group">
            <label>Penyakit</label>
            <select class="form-control" id="penyakit" name="penyakit">
                @foreach ($penyakit as $datas)
                    <option value="{{ $datas->nama }}">{{ $datas->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" id="antrianUpdate" data-dismiss="modal" class="btn btn-info">Submit</button>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            $("#dashboardNav").removeClass("active");
            $("#dokterNav").removeClass("active");
            $("#penyakitNav").addClass("active");
            $("#pasienNav").removeClass("active");
            $("#antrianNav").removeClass("active");
        });
    </script>
@endsection
