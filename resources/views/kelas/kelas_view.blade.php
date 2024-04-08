@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Data Kelas')

@section('content_header')
<div class="row">
    <div class="col-md-12">

        <h1 class="m-0 text-dark">Data Kelas</h1>
    </div>
</div>
@stop

@section('content')

<section class="content ">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 mb-5">

                <table id="table_siswa" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Jumlah Siswa</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($kelas as $data)
                        @if ( $data->kelas != 7)   
                        <tr>
                            <td class="nama">{{ $data->kelas }}</td>
                            <td>{{ $jumlahSiswaArray[$i] }} Siswa</td>
                            <td class="text-center">
                                <a class="btn btn-info" href="{{ route('kelasaktif.show',$data->id) }}">Lihat</a>
                            </td>
                        </tr>
                        @endif
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
    function add() {
        window.location = "{{ route('siswa.create') }}";
    }
    
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

  $(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var nama = $(this).parent().parent().find('.nama').text();
    var token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: 'Hapus data siswa '+nama+' ?',
        text: "Semua data siswa akan hilang!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
             type: "DELETE",
             url: "/siswa/"+id,
             data: {
                 'id'     :id,
                 '_token' : token,
                 },
            success: function (data) {   
                Swal.fire(
                    'Deleted!',
                    'Data siswa '+nama+' berhasil dihapus!',
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

</script>
@stop