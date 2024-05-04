@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Presensi Siswa')

@section('content_header')
    <div class="row">
        <div class="col-md-12">

            <h1 class="m-0 text-dark">Data Presensi Siswa</h1>
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
                @if (Auth::check() && Auth::user()->role == 'guru')
                    <div class="col-md-6 text-left">
                        <x-adminlte-button onclick="return add();" label="Presensi" theme="primary" icon="fas fa-plus" />
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
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Tanpa Keterangan</th>
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
                                    <td class="text-center">{{ $student->hadir }}</td>
                                    <td class="text-center">{{ $student->izin }}</td>
                                    <td class="text-center">{{ $student->sakit }}</td>
                                    <td class="text-center">{{ $student->tanpa_keterangan }}</td>
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
            window.location = "{{ route('presensi.create') }}";
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
