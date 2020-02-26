@extends('admin.layout.layout')

@section('content')
    <h2 class="mb-4">Data User
        <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#inputUserModal">Tambah User</a>
    </h2>
    <table class="table table-hover" align="center">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="dataUser" align="center">
			
		</tbody>
        {{-- <tbody>
            @foreach ($data as $datas)
                <tr align="center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $datas->username }}</td>
                    <td>{{ $datas->password }}</td>
                    <td>{{ $datas->status }}</td>
                    <td>
                        <a href="{{ url('/editDokter/' . $datas->idDokter) }}" class="btn-sm btn-info">Edit</a>
                        <a href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal" data-id="{{ $datas->idDokter }}" data-name="{{ $datas->name }}">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody> --}}
    </table>

    <!-- Modal Delete User -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete User</h5>
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
                    <button type="submit" id="userDelete" data-dismiss="modal" class="btn btn-secondary">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Input User -->
    <div class="modal fade" id="inputUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Input User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name">
                            </div>

                        <div class="form-group">
                            <label>{{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control" name="username">
                            </div>

                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Admin">Admin</option>
                            <option value="Dokter">Dokter</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="userInput" data-dismiss="modal" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5>Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="idEdit" name="id">
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control" id="nameEdit" name="name">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="usernameEdit" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                                <input type="password" class="form-control" id="passwordEdit" name="password">
                            </div>
                        <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="statusEdit" name="status">
                            <option value="Admin">Admin</option>
                            <option value="Dokter">Dokter</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="userUpdate" data-dismiss="modal" class="btn btn-info">Submit</button>
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
            $("#userNav").addClass("active");
        });
    </script>

<script>
    getDataUser()
    function getDataUser() {
        $.ajax({
            type:'GET',
            url:"{{ url('/getDataUser') }}",
            dataType: 'json',
            success: function(data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    if (data[i].username == "admin") {
                        html += '<tr>' + 
                                    '<td>'+ parseInt(i+1) +'</td>' + 
                                    '<td>'+ data[i].name +'</td>' + 
                                    '<td>'+ data[i].username +'</td>' + 
                                    '<td>'+ data[i].password + '</td>' +
                                    '<td>'+ data[i].status +'</td>' + 
                                    '<td>'+
                                        'disabled'
                                    '</td>'+ 
                                '</tr>';
                    } else {
                        html += '<tr>' + 
                                '<td>'+ parseInt(i+1) +'</td>' + 
                                '<td>'+ data[i].name +'</td>' + 
                                '<td>'+ data[i].username +'</td>' + 
                                '<td>'+ data[i].password + '</td>' +
                                '<td>'+ data[i].status +'</td>' + 
                                '<td>'+
                                    '<a style="margin-left:3px; margin-right: 2px" data-toggle="modal" data-target="#editUserModal" class="btn btn-info" href="#" role="button" data-name="'+ data[i].name +'" data-username="'+ data[i].username +'" data-password="'+ data[i].password +'" data-status="'+ data[i].status +'" data-id="'+ data[i].id +'">Edit</a>'+
                                    '<a style="margin-left:3px; margin-right: 2px" data-toggle="modal" data-target="#deleteUserModal" class="btn btn-danger" href="#" role="button" data-username="'+ data[i].username +'" data-id="'+ data[i].id +'">Delete</a>'+
                                '</td>'+ 
                            '</tr>';
                    }
                }
                $('#dataUser').html(html);
            }
        })   
    }

    $('#userInput').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/insertDataUser') }}",
            method: 'post',
            data: {
                name: $('#name').val(),
                username: $('#username').val(),
                password: $('#password').val(),
                status: $('#status').val(),
            },
            success: function(result){
                $('#name').val(''),
                $('#username').val(''),
                $('#password').val(''),
                getDataUser()
            }
        });
    });

    $('#editUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var username = button.data('username')
        var password = button.data('password')
        var status = button.data('status')

        var modal = $(this)
        modal.find('.modal-body #idEdit').val(id)
        modal.find('.modal-body #nameEdit').val(name)
        modal.find('.modal-body #usernameEdit').val(username)
        modal.find('.modal-body #passwordEdit').val(password)
        modal.find('.modal-body #statusEdit').val(status)
    })

    $('#userUpdate').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/updateDataUser/" + $('#idEdit').val(), 
            method: 'post',
            data: {
                name: $('#nameEdit').val(),
                username: $('#usernameEdit').val(),
                password: $('#passwordEdit').val(),
                status: $('#statusEdit').val(),
            },
            success: function(result){
                $('#nameEdit').val(''),
                $('#usernameEdit').val(''),
                $('#passwordEdit').val(''),
                $('#statusEdit').val(''),
                getDataUser()
            }
        });
    });
    

    $('#deleteUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var username = button.data('username')
        var id = button.data('id')

        var modal = $(this)
        modal.find('.modal-body #idDelete').val(id)
        $("#alert").html("Hapus Username <b>" + username + "</b> ?");
    })

    $('#userDelete').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/deleteDataUser/" + $('#idDelete').val(), 
            method: 'post',
            data: {
                name: $('#nameEdit').val(),
                username: $('#usernameEdit').val(),
                password: $('#passwordEdit').val(),
                status: $('#statusEdit').val(),
            },
            success: function(result){
                getDataUser()
            }
        });
    })
    
</script>
@endsection
