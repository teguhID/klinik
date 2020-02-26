@extends('admin.layout.layout')

@section('content')
    <h2 class="mb-4">Antrian Pasien
        <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#inputAntrianModal">Tambah Antrian</a>
    </h2>
    <table class="table table-hover" align="center">
        <thead align="center">
            <tr>
                <th>Antrian</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Keluhan</th>
                <th>Penyakit</th>
                <th>Obat</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($data as $datas)
			<tr> 
                <td> {{ $datas->noAntrian }} </td> 
                <td> {{ $datas->idAnggota }} </td> 
                <td> {{ $datas->namaAnggota }} </td> 
                <td> {{ $datas->keluhan }} </td>
                <td> {{ $datas->penyakit }} </td>
                <td> {{ $datas->obat }} </td>
                <td> {{ $datas->status }} </td> 
                <td>
                    @if ($datas->status == 'dalam antrian')
                        <a href="{{ url('/prosesPengobatan/'. $datas->idAnggota) }}" class="btn btn-info">Proses Pengobatan</a>
                    @endif
                    @if ($datas->status == 'dalam proses pengobatan')
                        <a href="#" data-toggle="modal" data-target="#inputObatModel" class="btn btn-success">Selesai Pengobatan</a>
                    @endif
                </td> 
            </tr>
            @endforeach
		</tbody>
    </table>

   
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
