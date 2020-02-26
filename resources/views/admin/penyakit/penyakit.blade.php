@extends('admin.layout.layout')

@section('content')
    <h2 class="mb-4">Data Penyakit
        <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#inputPenyakitModal">Tambah Penyakit</a>
    </h2>
    <table class="table table-hover" align="center">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="dataPenyakit" align="center">
			
		</tbody>
    </table>

    <!-- Modal Delete Penyakit -->
    <div class="modal fade" id="deletePenyakitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idDelete" name="id">
                    <h5 id="alert"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="penyakitDelete" data-dismiss="modal" class="btn btn-secondary">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Input Penyakit -->
    <div class="modal fade" id="inputPenyakitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Input Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Penyakit</label>
                            <input id="nama" type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="penyakitInput" data-dismiss="modal" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Penyakit -->
    <div class="modal fade" id="editPenyakitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5>Edit Penyakit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="idEdit" name="id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Penyakit</label>
                                <input id="namaEdit" type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsiEdit" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="penyakitUpdate" data-dismiss="modal" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <script>
        $(document).ready(function(){
            $("#dashboardNav").removeClass("active");
            $("#dokterNav").removeClass("active");
            $("#penyakitNav").addClass("active");
            $("#pasienNav").removeClass("active");
            $("#userNav").removeClass("active");
        });
    </script>

<script>
    getDataPenyakit()
    function getDataPenyakit() {
        $.ajax({
            type:'GET',
            url:"{{ url('/getDataPenyakit') }}",
            dataType: 'json',
            success: function(data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                        html += '<tr>' + 
                                '<td>'+ parseInt(i+1) +'</td>' + 
                                '<td>'+ data[i].nama +'</td>' + 
                                '<td>'+ data[i].deskripsi +'</td>' +
                                '<td>'+
                                    '<a style="margin-left:3px; margin-right: 2px" data-toggle="modal" data-target="#editPenyakitModal" class="btn btn-info" href="#" role="button" data-nama="'+ data[i].nama +'" data-deskripsi="'+ data[i].deskripsi +'" data-id="'+ data[i].id +'">Edit</a>'+
                                    '<a style="margin-left:3px; margin-right: 2px" data-toggle="modal" data-target="#deletePenyakitModal" class="btn btn-danger" href="#" role="button" data-nama="'+ data[i].nama +'" data-id="'+ data[i].id +'">Delete</a>'+
                                '</td>'+ 
                            '</tr>';
                }
                $('#dataPenyakit').html(html);
            }
        })   
    }

    $('#penyakitInput').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/insertDataPenyakit') }}",
            method: 'post',
            data: {
                nama: $('#nama').val(),
                deskripsi: $('#deskripsi').val()
            },
            success: function(result){
                $('#nama').val(''),
                $('#deskripsi').val(''),
                getDataPenyakit()
            }
        });
    });

    $('#editPenyakitModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nama = button.data('nama')
        var deskripsi = button.data('deskripsi')

        var modal = $(this)
        modal.find('.modal-body #idEdit').val(id)
        modal.find('.modal-body #namaEdit').val(nama)
        modal.find('.modal-body #deskripsiEdit').val(deskripsi)
    })

    $('#penyakitUpdate').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/updateDataPenyakit/" + $('#idEdit').val(), 
            method: 'post',
            data: {
                nama: $('#namaEdit').val(),
                deskripsi: $('#deskripsiEdit').val(),
            },
            success: function(result){
                $('#namaEdit').val(''),
                $('#deskripsiEdit').val(''),
                getDataPenyakit()
            }
        });
    });
    

    $('#deletePenyakitModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var id = button.data('id')

        var modal = $(this)
        modal.find('.modal-body #idDelete').val(id)
        $("#alert").html("Hapus Data Penyakit <b>" + nama + "</b> ?");
    })

    $('#penyakitDelete').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/deleteDataPenyakit/" + $('#idDelete').val(), 
            method: 'post',
            data: {
                
            },
            success: function(result){
                getDataPenyakit()
            }
        });
    })
    
</script>
@endsection
