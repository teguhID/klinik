@extends('admin.layout.layout')

@section('content')
    <h2 class="mb-4">Data Pasien
        <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#inputPasienModal">Tambah Pasien</a>
    </h2>
    <table class="table table-hover" align="center">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Ktp</th>
                <th>Usia</th>
                <th>Alamat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="dataPasien" align="center">
			
		</tbody>
    </table>

    <!-- Modal Delete Pasien -->
    <div class="modal fade" id="deletePasienModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idDelete" nama="id">
                    <h5 id="alert"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="pasienDelete" data-dismiss="modal" class="btn btn-secondary">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Input Pasien -->
    <div class="modal fade" id="inputPasienModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Input Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="namaAnggota" id="namaAnggota">
                        </div>
                        <div class="form-group">
                            <label>Ktp</label>
                            <input class="form-control" name="ktp" id="ktp">
                        </div>
                        <div class="form-group">
                            <label>Usia</label>
                            <input class="form-control" name="usia" id="usia">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="5" name="alamat" id="alamat"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="pasienInput" data-dismiss="modal" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pasien -->
    <div class="modal fade" id="editPasienModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5>Edit Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="idEdit" name="id">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="namaAnggota" id="namaAnggotaEdit">
                        </div>
                        <div class="form-group">
                            <label>Ktp</label>
                            <input class="form-control" name="ktp" id="ktpEdit">
                        </div>
                        <div class="form-group">
                            <label>Usia</label>
                            <input class="form-control" name="usia" id="usiaEdit">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="5" name="alamat" id="alamatEdit"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="pasienUpdate" data-dismiss="modal" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <script>
        $(document).ready(function(){
            $("#dashboardNav").removeClass("active");
            $("#dokterNav").removeClass("active");
            $("#penyakitNav").removeClass("active");
            $("#pasienNav").removeClass("active");
            $("#pasienNav").addClass("active");
        });
    </script>

<script>
    getDataPasien()
    function getDataPasien() {
        $.ajax({
            type:'GET',
            url:"{{ url('/getDataPasien') }}",
            dataType: 'json',
            success: function(data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                        html += '<tr>' + 
                                    '<td>'+ parseInt(i+1) +'</td>' + 
                                    '<td>'+ data[i].idAnggota +'</td>' + 
                                    '<td>'+ data[i].namaAnggota +'</td>' + 
                                    '<td>'+ data[i].ktp +'</td>' + 
                                    '<td>'+ data[i].usia + '</td>' +
                                    '<td>'+ data[i].alamat +'</td>' + 
                                    '<td>'+
                                        '<a style="margin-left:3px; margin-right: 2px" data-toggle="modal" data-target="#editPasienModal" class="btn btn-info" href="#" role="button" data-nama="'+ data[i].namaAnggota +'" data-ktp="'+ data[i].ktp +'" data-usia="'+ data[i].usia +'" data-alamat="'+ data[i].alamat +'" data-id="'+ data[i].idAnggota +'">Edit</a>'+
                                        '<a style="margin-left:3px; margin-right: 2px" data-toggle="modal" data-target="#deletePasienModal" class="btn btn-danger" href="#" role="button" data-nama="'+ data[i].namaAnggota +'" data-id="'+ data[i].idAnggota +'">Delete</a>'+
                                    '</td>'+ 
                                '</tr>';
                }
                $('#dataPasien').html(html);
            }
        })   
    }

    $('#pasienInput').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/insertDataPasien') }}",
            method: 'post',
            data: {
                namaAnggota: $('#namaAnggota').val(),
                ktp: $('#ktp').val(),
                usia: $('#usia').val(),
                alamat: $('#alamat').val(),
            },
            success: function(result){
                $('#namaAnggota').val(''),
                $('#ktp').val(''),
                $('#usia').val(''),
                $('#alamat').val(''),
                getDataPasien()
            }
        });
    });

    $('#editPasienModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nama = button.data('nama')
        var ktp = button.data('ktp')
        var usia = button.data('usia')
        var alamat = button.data('alamat')
       

        var modal = $(this)
        modal.find('.modal-body #idEdit').val(id)
        modal.find('.modal-body #namaAnggotaEdit').val(nama)
        modal.find('.modal-body #ktpEdit').val(ktp)
        modal.find('.modal-body #usiaEdit').val(usia)
        modal.find('.modal-body #alamatEdit').val(alamat)
       
    })

    $('#pasienUpdate').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/updateDataPasien/" + $('#idEdit').val(), 
            method: 'post',
            data: {
                namaAnggota: $('#namaAnggotaEdit').val(),
                ktp: $('#ktpEdit').val(),
                usia: $('#usiaEdit').val(),
                alamat: $('#alamatEdit').val(),
            },
            success: function(result){
                getDataPasien()
            }
        });
    });
    

    $('#deletePasienModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var id = button.data('id')

        var modal = $(this)
        modal.find('.modal-body #idDelete').val(id)
        $("#alert").html("Hapus Pasiennama <b>" + nama + "</b> ?");
    })

    $('#pasienDelete').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/deleteDataPasien/" + $('#idDelete').val(), 
            method: 'post',
            data: {
 
            },
            success: function(result){
                getDataPasien()
            }
        });
    })
    
</script>
@endsection
