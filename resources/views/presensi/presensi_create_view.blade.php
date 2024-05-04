@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Presensi Siswa')

@section('content_header')
    <div class="row">
        <div class="col-md-12">

            @php
                $bulan = [
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember',
                ];
                setlocale(LC_TIME, 'id_ID');
                $bulan_indonesia = $bulan[date('F')];
            @endphp

            <h1 class="m-0 text-dark">Tambah Data Presensi Siswa ({{ date('d') }} {{ $bulan_indonesia }}
                {{ date('Y') }})</h1>

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
                {{-- && Auth::user()->role == 'guru' --}}
                @if (Auth::check())
                    <div class="col-md-6 text-left">
                        <x-adminlte-button id="btn-hadir-semua" label="Hadir Semua" theme="primary" icon="fas fa-check" />
                        <input type="hidden" name="kelas" value="{{ $gurukelas }}">
                        <input type="hidden" name="tahun_ajaran" value="{{ $tahunAjaran->tahun_ajaran }}">
                        <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                    </div>
                @endif
            </div>
            <div class="row">

                <div class="col-md-12">

                    <table id="table_siswa" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Status</th>
                                <th>Presensi</th>
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
                                    <td>{{ $student->status }}</td>
                                    <td class="text-center">
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

            let ids_siswa = $(this).data('id');
            var kelas = $('input[name="kelas"]').val();
            var tahunAjaran = $('input[name="tahun_ajaran"]').val();
            var tanggal = $('input[name="tanggal"]').val();
            var token = $("meta[name='csrf-token']").attr("content");
            // Show SweetAlert modal with select dropdown
            Swal.fire({
                title: 'Pilih Status',
                input: 'select',
                inputOptions: {
                    'Hadir': 'Hadir',
                    'Sakit': 'Sakit',
                    'Izin': 'Izin',
                    'Tanpa Keterangan': 'Tanpa Keterangan',
                },
                inputPlaceholder: 'Pilih Status',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                preConfirm: (selectedStatus) => {
                    // Send AJAX request to update user role
                    return $.ajax({
                        url: '{{ route('hadir.semua') }}', // Using the named route
                        type: 'POST',
                        data: {
                            kelas: kelas,
                            tahun_ajaran: tahunAjaran,
                            tanggal: tanggal,
                            ids_siswa: ids_siswa,
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


        $(document).ready(function() {
            $('#btn-hadir-semua').click(function() {
                var kelas = $('input[name="kelas"]').val();
                var tahunAjaran = $('input[name="tahun_ajaran"]').val();
                var tanggal = $('input[name="tanggal"]').val();
                var token = $("meta[name='csrf-token']").attr("content");

                var ids_siswa = [];
                $('#table_siswa tbody tr').each(function() {
                    var id = $(this).find('.btn-status').data('id');
                    ids_siswa.push(id);
                });

                $.ajax({
                    url: '{{ route('hadir.semua') }}', // Using the named route
                    type: 'POST',
                    data: {
                        kelas: kelas,
                        tahun_ajaran: tahunAjaran,
                        tanggal: tanggal,
                        status: 'Hadir',
                        ids_siswa: ids_siswa,
                        '_token': token,

                    },
                    success: function(response) {
                        // Show success message
                        Swal.fire('Sukses', response.message, 'success').then(() => {
                                window.location.reload();
                            });;
                    },
                    error: function(xhr, status, error) {
                        // Show error message
                        Swal.fire('Error', 'Terjadi kesalahan: ' + xhr.responseText, 'error');
                    }
                });
            });
        });
    </script>



@stop
