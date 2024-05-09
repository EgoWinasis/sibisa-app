@extends('adminlte::page')

@section('title', 'Pengaturan Tahun Ajaran')
@section('content_header')
    <h1>Pengaturan Tahun Ajaran</h1>
@stop

@section('content')
    <div id="layoutSidenav" style="min-height: 500px">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="row my-3">
                        <div class="col-md-12">

                            <x-adminlte-button onclick="return add();" label="Tambah" theme="primary" icon="fas fa-plus" />
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-12">

                            <table id="table_siswa" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($tahun_ajaran as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="nama">{{ $data->tahun_ajaran }}</td>
                                            <td class="text-center">
                                                @if ($data->status == 0)
                                                    <span class="badge badge-secondary">Non-Aktif</span>
                                                @else
                                                    <span class="badge badge-success">Aktif</span>
                                                @endif
                                            </td>

                                            <td class="text-center">

                                                @if ($data->status == 0)
                                                    <a class="btn btn-info btn-active"
                                                        data-id="{{ $data->id }}">Aktif</a>
                                                @endif
                                            </td>
                                        </tr>
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
            window.location = "{{ route('tahunajaran.create') }}";
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

                
            }).buttons().container().appendTo('#table_siswa_wrapper .col-md-6:eq(0)');

        });



        $(document).on('click', '.btn-active', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var tahun = $(this).parent().parent().find('.nama').text();
            var token = $("meta[name='csrf-token']").attr("content");

            Swal.fire({
                title: 'Aktif kan Tahun Ajaran ' + tahun + ' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "PUT",
                        url: "/tahunajaran/" + id,
                        data: {
                            'id': id,
                            '_token': token,
                        },
                        success: function(data) {
                            Swal.fire(
                                'Berhasil!',
                                'Tahun Ajaran ' + tahun + ' berhasil diaktifkan!',
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
