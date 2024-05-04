@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Siswa')

@section('content_header')
    <div class="row">
        <div class="col-md-12">

            <h1 class="m-0 text-dark">Data Siswa Angkatan {{ $tahunAjaranAktif }}</h1>
        </div>
    </div>
@stop

@section('content')

    <section class="content ">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row my-3">
                <div class="col-md-6 text-left">
                    <x-adminlte-button onclick="return add();" label="Tambah" theme="primary" icon="fas fa-plus" />
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-2 text-right">
                    <select class="form-control" onchange="ubahAngkatan(this)">
                        @foreach ($tahunAjaran as $tahun)
                            <option value="{{ $tahun->tahun_ajaran }}"
                                {{ $tahun->tahun_ajaran == $tahunAjaranAktif ? 'selected' : '' }}>
                                {{ $tahun->tahun_ajaran }}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="row">

                <div class="col-md-12">

                    <table id="table_siswa" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $student->nis }}</td>
                                    <td class="nama">{{ $student->nama_lengkap }}</td>
                                    <td class="text-center">
                                        {{ $student->jen_kel == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td class="text-center">
                                        @php
                                            $badgeClass = '';
                                            switch ($student->status) {
                                                case 'Aktif':
                                                    $badgeClass = 'badge bg-success';
                                                    break;
                                                case 'Pindah':
                                                    $badgeClass = 'badge bg-warning text-dark';
                                                    break;
                                                case 'Keluar':
                                                    $badgeClass = 'badge bg-danger';
                                                    break;
                                                case 'Lulus':
                                                    $badgeClass = 'badge bg-info';
                                                    break;
                                                default:
                                                    $badgeClass = 'badge bg-secondary';
                                                    break;
                                            }
                                        @endphp
                                        <span class="{{ $badgeClass }}">{{ $student->status }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{ route('siswa.show', $student->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('siswa.edit', $student->id) }}">Edit</a>
                                        <a class="btn btn-success btn-status" data-id="{{ $student->id }}">Status</a>
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
@php
    $tahunajaranfix = \App\Models\ModelTahunajaran::where('status', 1)->value('tahun_ajaran');
@endphp
@section('js')
    <script type="text/javascript">
        function add() {
            window.location = "{{ route('siswa.create') }}";
        }

        var tahunajaranfix = {!! json_encode($tahunajaranfix) !!};
        // get data 
        function ubahAngkatan(select) {
            let redirectUrl = '';
            var tahunAjaran = select.value;
            if (tahunAjaran == tahunajaranfix) {
                tahunAjaran = tahunAjaran.replace('/', '-');
                redirectUrl = "/siswa";
            } else {
                tahunAjaran = tahunAjaran.replace('/', '-');
                redirectUrl = "/siswa/angkatan/" + tahunAjaran;
            }
            window.location.href = redirectUrl;
        }
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


        $(document).on('click', '.btn-status', function(e) {
            e.preventDefault();

            let userId = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            // Show SweetAlert modal with select dropdown
            Swal.fire({
                title: 'Pilih Status',
                input: 'select',
                inputOptions: {
                    'Aktif': 'Aktif',
                    'Pindah': 'Pindah',
                    'Keluar': 'Keluar',
                    'Lulus': 'Lulus',
                },
                inputPlaceholder: 'Pilih Status',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                preConfirm: (selectedStatus) => {
                    // Send AJAX request to update user role
                    return $.ajax({
                        url: '/update-siswa/' + userId,
                        type: 'PUT',
                        data: {
                            status: selectedStatus,
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
