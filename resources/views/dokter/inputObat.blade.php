@extends('dokter.layout.layout')

@section('content')
    <h2 class="mb-4">Input Obat & Penyakit</h2>
    @foreach ($data as $datas)
    <form action="{{ url('/selesaiBerobat/' . $datas->idAntrian) }}" method="POST">
        @csrf
        <div class="modal-body">
            <input type="hidden" class="form-control" id="idEdit" name="id">
            <div class="form-group">
                <label>id Anggota</label>
                <input type="text" class="form-control" id="idAnggota" disabled value="{{ $datas->idAnggota }}">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" disabled value="{{ $datas->namaAnggota }}">
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                    <textarea class="form-control" id="keluhan" cols="30" rows="10" disabled>{{ $datas->keluhan }}</textarea>
                </div>
            <div class="form-group">
            <div class="form-group">
                <label>Obat</label>
                    <input type="text" class="form-control" id="obat" name="obat">
                </div>
            <div class="form-group">
            <label>Penyakit</label>
            <select class="form-control" id="penyakit" name="penyakit">
                @foreach ($penyakit as $datas)
                    <option value="{{ $datas->nama }}">{{ $datas->nama }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" id="antrianUpdate" data-dismiss="modal" class="btn btn-info">Submit</button>
    </form>
    @endforeach
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
