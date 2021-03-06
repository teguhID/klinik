@extends('user.layout.layout')

@section('content')
    
<section class="clean-block clean-form dark">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">Pendaftaran Online</h2>
            <p>Harap isi form dengan benar dan&nbsp;sesuai dengan keadaan penyakit anda</p>
        </div>
        <form action="{{ url('/inputAntrianAnggota') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Id Anggota</label>
                <select class="form-control" id="idAnggota" name="idAnggota"></select>
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <textarea class="form-control" rows="5" name="keluhan"></textarea>
            </div>
            <div class="form-group">
                <label>Dokter</label>
                 <a href="#" data-toggle="modal" data-target="#dokterModal"><i class="fa fa-info-circle" aria-hidden="true" style="color:red"></i></a>
                    <select class="form-control" name="idDokter" id="idDokter">
                        @foreach ($data as $datas)
                            <option value="{{ $datas->idDokter }}">{{ $datas->nama }} ({{ $datas->kualifikasi }})</option>
                        @endforeach
                    </select>
                <small class="form-text text-muted">klik lingkaran merah untuk informasi profile dokter</small>
            </div>

            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Daftar</button></div>
        </form>
    </div>
</section>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="dokterModal" tabindex="-1" role="dialog" aria-labelledby="dokterModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Str</th>
                        <th>Kualifikasi</th>
                        <th>Univeritas</th>
                    </tr>
                </thead>
                <tbody id="data">
			
                </tbody>
                <tbody>
                    <?php $no = 1;?>
                    @foreach ($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->str }}</td>
                        <td>{{ $datas->kualifikasi }}</td>
                        <td>{{ $datas->universitas }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<script>
    $('#idAnggota').select2({
        placeholder: 'Masukan ID Anggota ...',
        ajax: {
        url: '/listAnggotaAutocomplete',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
            results:  $.map(data, function (item) {
                return {
                text: item.namaAnggota + ' (' + item.idAnggota + ')' , //data yang ditampilkan
                id: item.idAnggota //data yang di passing
                }
            })
            };
        },
        cache: true
        }
    });
</script>

@endsection

