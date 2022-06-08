@extends('layouts.default')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Halaman Registrasi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Registrasi</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <h5 class="card-title">Form Data Peserta</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="form_data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control form-control-sm"  required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" required>
                                            <label class="form-check-label">Laki-laki</label>
                                       </div>
                                       <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                                            <label class="form-check-label">Perempuan</label>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="hobi">Hobi</label>
                                        <input type="text" name="hobi" id="hobi" class="form-control form-control-sm"  required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-sm"  required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="telp">Telepon</label>
                                        <input type="text" name="telp" id="telp" class="form-control form-control-sm" pattern="[0-9]{1,14}" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-sm" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-sm" minlength="7" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Daftar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <h5 class="card-title">Data Peserta</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm" id="table_data" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Hobi</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@push('after-scripts')
   <script>
       $(document).ready(function(){
           $('#form_data').on('submit', function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data akan di simpan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('peserta.save') }}",
                            type: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend : function(){
                                Swal.fire({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onBeforeOpen: () => {
                                        Swal.showLoading()
                                    },
                                    allowOutsideClick: false,
                                })
                            },
                            success: function(data){
                                if(data.code == 200){
                                    Swal.fire(
                                        'Berhasil!',
                                        'Data berhasil disimpan.',
                                        'success'
                                    )
                                    $('#form_data')[0].reset();
                                    $('#table_data').DataTable().ajax.reload();
                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: data.message
                                    })
                                }
                            },
                            error: function(data){
                                Swal.fire(
                                    'Gagal!',
                                    'Data gagal disimpan.',
                                    'error'
                                )
                            }
                        });
                    }
                })
           });

           var table = $('#table_data').DataTable({
                ajax : {
                    url : "{{ route('peserta.data') }}",
                    type : "POST",
                    data : {
                        _token : "{{ csrf_token() }}"
                    },
                },
                processing : true,
                order : [],
                columns : [
                    {
                        data : 'id',
                        orderable : false,
                        searchable : false,
                        className : 'no-export',
                    },
                    {
                        data : 'nama',
                    },
                    {
                        data : 'jenis_kelamin',
                    },
                    {
                        data : 'email'
                    },
                    {
                        data : 'telp'
                    },
                    {
                        data : 'username'
                    },
                    {
                        data : 'id',
                        orderable : false,
                        searchable : false,
                        className : 'no-export',
                        render : function(data, type, row){
                            return `
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary btn-flat">Action</button>
                                    <button type="button"
                                        class="btn btn-sm btn-primary btn-flat dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu" style="">
                                        <button class="dropdown-item btn-delete" href="#"><i
                                                class="fa fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            `;
                        }
                    }
                ]
            })

            table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            $('#table_data tbody').on('click', 'button.btn-delete', function(){
                var data = table.row($(this).parents('tr')).data();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data akan di hapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('peserta.delete') }}",
                            type: "POST",
                            data: {
                                _token : "{{ csrf_token() }}",
                                id : data.id
                            },
                            beforeSend : function(){
                                Swal.fire({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onBeforeOpen: () => {
                                        Swal.showLoading()
                                    },
                                    allowOutsideClick: false,
                                })
                            },
                            success: function(data){
                                Swal.fire(
                                    'Berhasil!',
                                    'Data berhasil di hapus.',
                                    'success'
                                )
                                table.ajax.reload();
                            },
                            error: function(data){
                                Swal.fire(
                                    'Gagal!',
                                    'Data gagal di hapus.',
                                    'error'
                                )
                            }
                        });
                    }
                })
            });
       })
   </script>
@endpush
