@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Guru')

@section('content_header')
    <div class="row">
        <div class="col-md-12">

            <h1 class="m-0 text-dark">Data Guru</h1>
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

            </div>
            <div class="row">

                <div class="col-md-12">

                    <table id="table_siswa" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
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
                            @foreach ($guru as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->nip }}</td>
                                    <td class="nama">{{ $data->nama }}</td>
                                    <td class="text-center">
                                        {{ $data->jen_kel == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td class="text-center">
                                        @php
                                            $badgeClass = '';
                                            switch ($data->status) {
                                                case 'Aktif':
                                                    $badgeClass = 'badge bg-success';
                                                    break;
                                                case 'Mutasi':
                                                    $badgeClass = 'badge bg-warning text-dark';
                                                    break;
                                                case 'Non-Aktif':
                                                    $badgeClass = 'badge bg-danger';
                                                    break;

                                                default:
                                                    $badgeClass = 'badge bg-secondary';
                                                    break;
                                            }
                                        @endphp
                                        <span class="{{ $badgeClass }}">{{ $data->status }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-show" data-id="{{ $data->id }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('guru.edit', $data->id) }}">Edit</a>
                                        <a class="btn btn-success btn-status" data-id="{{ $data->id }}">Status</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>


                </div>
            </div>

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
        function add() {
            window.location = "{{ route('guru.create') }}";
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
                    'Mutasi': 'Mutasi',
                    'Non-Aktif': 'Non-Aktif',
                },
                inputPlaceholder: 'Pilih Status',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                preConfirm: (selectedStatus) => {
                    // Send AJAX request to update user role
                    return $.ajax({
                        url: '/update-guru/' + userId,
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showButtons = document.querySelectorAll('.btn-show');
            showButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default behavior of the anchor tag

                    // Get the ID from the data-id attribute
                    const id = this.getAttribute('data-id');

                    // Send an AJAX request to fetch the data
                    fetch(`/guru/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            // Display the data in a modal using SweetAlert
                            Swal.fire({
                                title: 'Data Guru Details',
                                html: `
                                <table class="table text-left">
                                    <tbody>
                                        <tr>
                                            <td>NIP</td>
                                            <td>:</td>
                                            <td>${data.nip}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>${data.nama}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>${data.jen_kel}</td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td>${data.jabatan}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td>:</td>
                                            <td>${data.tempat_lahir}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>${data.tgl_lahir}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>${data.alamat}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>:</td>
                                            <td>${data.telepon}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>${data.status}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            `,
                                showCancelButton: false,
                                focusConfirm: false,
                                confirmButtonText: 'OK',
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>
@stop
