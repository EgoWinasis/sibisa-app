@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Siswa')

@section('content_header')
    <div class="row">
        <div class="col-md-12">

            <h1 class="m-0 text-dark">Data Siswa</h1>
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
       

        // get data 
        function ubahAngkatan(select) {
            var tahunAjaran = select.value;
            tahunAjaran = tahunAjaran.replace('/', '-');
            console.log(tahunAjaran);
            var redirectUrl = "/siswa/angkatan/" + tahunAjaran;
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


     
    </script>
@stop
