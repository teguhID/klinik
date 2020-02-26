@extends('user.layout.layout')
@section('content')

<div class="container" style="padding-bottom: 50px;padding-top: 50px;">
    <div class="row float-center" style="padding-bottom: 20px;padding-top: 20px;">
        <div class="col-12 text-center">
            <h3>Antrian</h3>
            <h6><b>{{ date('d-m-Y') }}</b></h6>
        </div>
    </div>
    <div class="row">
    <div class="col-12">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>ID Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Keluhan</th>
                    <th>Dokter</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                <tr>
                    <td>{{ $datas->noAntrian }}</td>
                    <td>{{ $datas->idAnggota }}</td>
                    <td>{{ $datas->namaAnggota }}</td>
                    <td>{{ $datas->keluhan }}</td>
                    <td>{{ $datas->nama }}</td>
                    <td>{{ $datas->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>

@endsection
