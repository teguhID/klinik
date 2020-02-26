@extends('admin.layout.layout')

@section('content')
    <h2 class="mb-4">Data Dokter <a href="{{ url('/tambahDokter') }}" class="btn btn-success float-right">Tambah Dokter</a></h2>
    <table class="table table-hover" align="center">
        <thead>
            <tr align="center">
                <th>No</th>
                <th width="25%">Nama</th>
                <th width="25%">Kualifikasi</th>
                <th width="20%">Status</th>
                <th width="30%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            @foreach ($data as $datas)
                <tr align="center">
                    <td>{{ $no++ }}</td>
                    <td><a href="{{ url('/detailDokter/' . $datas->idDokter) }}" style="color:black">{{ $datas->nama }}</a></td>
                    <td>{{ $datas->kualifikasi }}</td>
                    <td>{{ $datas->status }}</td>
                    <td>
                        @if ($datas->status == 'tidak hadir')
                            <a href="{{ url('/statusDokter/' . $datas->idDokter) }}" class="btn-sm btn-success">Hadir</a>
                        @else
                            <a href="{{ url('/statusDokter/' . $datas->idDokter) }}" class="btn-sm btn-success">Tidak Hadir</a>
                        @endif
                        <a href="{{ url('/editDokter/' . $datas->idDokter) }}" class="btn-sm btn-info">Edit</a>
                        <a href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal" data-id="{{ $datas->idDokter }}" data-nama="{{ $datas->nama }}">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Delete -->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 id="textMessage"></h4>
                </div>
                <form id="formDelete" action="" method="post">
                    {{ csrf_field() }}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-secondary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#hapusModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var nama = button.data('nama')
            var id = button.data('id')
            var modal = $(this)
            modal.find('#textMessage').text('Hapus Data "'+ nama +'"')
            modal.find('#formDelete').attr('action', "/deleteDokter/" + id);
        })
        $(document).ready(function(){
            $("#dashboardNav").removeClass("active");
            $("#dokterNav").addClass("active");
            $("#penyakitNav").removeClass("active");
            $("#pasienNav").removeClass("active");
            $("#userNav").removeClass("active");
        });
    </script>

@endsection
