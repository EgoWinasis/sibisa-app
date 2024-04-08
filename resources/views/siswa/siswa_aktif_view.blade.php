@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Siswa')

@section('content_header')
<div class="row">
    <div class="col-md-12">

        <h1 class="m-0 text-dark">Data Siswa Kelas {{$gurukelas}}</h1>
    </div>
</div>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        
        <div class="row">

            <div class="col-md-12">

                <table id="table_siswa" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $student->nis }}</td>
                            <td class="nama">{{ $student->nama_lengkap }}</td>
                            <td>{{ $student->jen_kel == "Laki-laki" ? "Laki-laki" : "Perempuan" }}</td>
                            <td class="text-center"><img
                                    src="{{$student->foto_siswa == "user_default_profil.png" ? asset('storage/images/user_default_profil.png') : asset('storage/images/foto-siswa/'.$student->foto_siswa);}}"
                                    width="50px" alt="Foto Siswa"></td>
                            <td>
                                <a class="btn btn-info" href="{{ route('siswa.show',$student->id) }}">Lihat</a> 
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
<div id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Buku Induk Siswa - Kampus Mengajar
        Angkatan 5 </div>
@stop
{{-- @push('js')
<script src="asset('vendor/sweetalert2/sweetalert2.min.js')"></script>
@endpush --}}

@section('js')
<script type="text/javascript">
    
    
  $(function () {
    $("#table_siswa").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["excel", "pdf", "print"],
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            }
        ]
    }).buttons().container().appendTo('#table_siswa_wrapper .col-md-6:eq(0)');
   
  });



</script>
@stop