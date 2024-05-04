@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Akun Wali Murid')

@section('content_header')
    <div class="row">
        <div class="col-md-12">

            <h1 class="m-0 text-dark">Data Akun Wali Murid</h1>
        </div>
    </div>
@stop

@section('content')

    <section class="content ">
        <div class="container-fluid">

            <div class="row my-3">

            </div>
            <div class="row">

                <div class="col-md-12">

                    <table id="table_siswa" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Status Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($students as $student)
                                @php
                                    $userExist = DB::table('users_wali')
                                        ->select('nis', 'isActive')
                                        ->where('nis', '=', $student->nis)
                                        ->first();
                                @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $student->nis }}</td>
                                    <td class="nama">{{ $student->nama_lengkap }}</td>
                                    <td class="text-center">
                                        @if (!$userExist)
                                            <span class="badge bg-secondary">Belum Terdaftar</span>
                                        @else
                                            @php
                                                $badgeClass = '';
                                                switch ($userExist->isActive) {
                                                    case 1:
                                                        $badgeClass = 'badge bg-success';
                                                        break;
                                                    case 0:
                                                        $badgeClass = 'badge bg-danger';
                                                        break;
                                                    default:
                                                        $badgeClass = 'badge bg-secondary';
                                                        break;
                                                }
                                            @endphp

                                            <span
                                                class="{{ $badgeClass }}">{{ $userExist && $userExist->isActive == 0 ? 'Non-Aktif' : 'Aktif' }}</span>
                                        @endif

                                    </td>
                                    <td class="text-center">


                                        @if (!$userExist)
                                            <a class="btn btn-info btn-buat" data-id="{{ $student->id }}">Buat</a>
                                        @else
                                            <a class="btn btn-success btn-status" data-id="{{ $student->id }}">Status</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>


                </div>
            </div>

            <br>
            <br>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop
@section('footer')
    @include('footer')
@stop
{{-- @push('js')
<script src="asset('vendor/sweetalert2/sweetalert2.min.js')"></script>
@endpush --}}

@section('js')
    <script type="text/javascript">
        $(function() {
            $("#table_siswa").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                //   "buttons": ["excel", "pdf", "print"],
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
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


        $(document).on('click', '.btn-buat', function(e) {
            e.preventDefault();

            let userId = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            // Show SweetAlert modal with select dropdown
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin membuat pengguna ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('create.wali.user') }}',
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        data: {
                            id: userId, // Make sure id is defined or pass it as a parameter
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Pengguna berhasil dibuat',
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Gagal membuat pengguna: ' + xhr.responseText,
                            });
                        }
                    });
                }
            });

        });
        $(document).on('click', '.btn-status', function(e) {
            e.preventDefault();

            let userId = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            // Show SweetAlert modal with select dropdown
            Swal.fire({
                title: 'Pilih Status',
                input: 'select',
                inputOptions: {
                    1: 'Aktif',
                    0: 'Non-Aktif',
                },
                inputPlaceholder: 'Pilih Status',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                preConfirm: (selectedStatus) => {
                    // Send AJAX request to update user role
                    return $.ajax({
                        url: '{{ route('update.wali.user') }}',
                        type: 'PUT',
                        data: {
                            status: selectedStatus,
                            id: userId, // Make sure id is defined or pass it as a parameter
                            '_token': token,

                        },
                        success: function(data) {
                            Swal.fire(
                                'Updated!',
                                'Data Status berhasil diubah!',
                                'success'
                            ).then(() => {
                                window.location.reload();
                            });

                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                type: 'error',
                                title: 'Gagal memperbarui status',
                                text: xhr.responseJSON.message
                            });
                        }
                    });
                }
            });
        });
    </script>
@stop
