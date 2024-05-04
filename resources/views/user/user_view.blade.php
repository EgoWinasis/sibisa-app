@extends('adminlte::page')

@section('title', 'Kelola Akun')
@section('content_header')
    <h1>Kelola Akun</h1>
@stop

@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="row my-3">
                        <div class="col-md-12">
                            <x-adminlte-button onclick="return add();" label="Buat Akun" theme="primary" icon="fas fa-plus" />
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">

                            <table id="table_siswa" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Peran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        @if (!(Auth::user()->id == $user->id))
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td class="nama">{{ $user->name }}</td>
                                                <td>{{ $user->nip }}</td>
                                                <td class="text-center">
                                                    @if ($user->role === 'guru')
                                                        <span class="badge bg-primary">Guru</span>
                                                    @elseif ($user->role === 'admin')
                                                        <span class="badge bg-danger">Admin</span>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    @if ($user->isActive == 0)
                                                        <a class="btn btn-info btn-active"
                                                            data-id="{{ $user->id }}">Active</a>
                                                    @endif
                                                    <a class="btn btn-info btn-role" data-id="{{ $user->id }}">Peran</a>
                                                    <a class="btn btn-danger btn-delete"
                                                        data-id="{{ $user->id }}">Hapus</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>

                            </table>


                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </main>
        </div><!-- /.container-fluid -->
    </div><!-- /.container-fluid -->
    <!-- /.content -->
@stop
@section('footer')
    @include('footer')
@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.Sweetalert2', true)

@section('js')
    <script type="text/javascript">
        function add() {
            window.location = "{{ route('user.create') }}";
        }
        $(function() {
            $("#table_siswa").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,

                "buttons": [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    }
                ]
            }).buttons().container().appendTo('#table_siswa_wrapper .col-md-6:eq(0)');

        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nama = $(this).parent().parent().find('.nama').text();
            var token = $("meta[name='csrf-token']").attr("content");

            Swal.fire({
                title: 'Hapus data user ' + nama + ' ?',
                text: "Semua data user akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "/users/" + id,
                        data: {
                            'id': id,
                            '_token': token,
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Data user ' + nama + ' berhasil dihapus!',
                                'success'
                            )
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: error
                            })
                        }
                    });

                }
            })

        });

        $(document).on('click', '.btn-role', function(e) {
            e.preventDefault();

            let userId = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            // Show SweetAlert modal with select dropdown
            Swal.fire({
                title: 'Pilih Peran',
                input: 'select',
                inputOptions: {
                    'guru': 'Guru',
                    'admin': 'Admin',
                },
                inputPlaceholder: 'Pilih Peran',
                showCancelButton: true,
                confirmButtonText: 'Save',
                preConfirm: (selectedRole) => {
                    // Send AJAX request to update user role
                    return $.ajax({
                        url: '/users/' + userId,
                        type: 'PUT',
                        data: {
                            role: selectedRole,
                            '_token': token,

                        },
                        success: function(data) {
                            Swal.fire(
                                'Updated!',
                                'Data Peran berhasil diubah!',
                                'success'
                            )
                            window.location.reload();

                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                type: 'error',
                                title: 'Failed to update role',
                                text: xhr.responseJSON.message
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.btn-active', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nama = $(this).parent().parent().find('.nama').text();
            var token = $("meta[name='csrf-token']").attr("content");

            Swal.fire({
                title: 'Aktivasi user ' + nama + ' ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "PUT",
                        url: "/users/" + id,
                        data: {
                            'id': id,
                            '_token': token,
                        },
                        success: function(data) {
                            Swal.fire(
                                'Berhasil!',
                                'User ' + nama + ' berhasil diaktifkan!',
                                'success'
                            )
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: error
                            })
                        }
                    });

                }
            })

        });
    </script>
@stop
