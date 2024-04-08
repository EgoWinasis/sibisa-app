@extends('adminlte::page')

@section('title', 'Pengaturan Guru')
@section('content_header')
    <h1>Pengaturan Guru</h1>
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
                    </div>
                    <div class="row">

                        <div class="col-md-12">

                            <table id="table_siswa" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran</th>
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
                                                @if (App\Models\ModelSettingGuru::where('id_tahun_ajaran', $data->id)->exists())
                                                    <a class="btn btn-warning btn-set" onclick=" return add()"
                                                        data-id="{{ $data->id }}">Ubah Guru</a>
                                                @else
                                                    <a class="btn btn-success btn-set" onclick=" return add()"
                                                        data-id="{{ $data->id }}">Pilih Guru</a>
                                                @endif
                                                @if (App\Models\ModelSettingGuru::where('id_tahun_ajaran', $data->id)->exists())
                                                    <a class="btn btn-info btn-show" data-id="{{ $data->id }}">Lihat</a>
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
    <div id="mycredit"><strong> Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi Buku Induk Siswa - Kampus
            Mengajar
            Angkatan 5 </div>
@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.Sweetalert2', true)

@section('js')
    <script type="text/javascript">
        function add() {
            var dataId = document.querySelector('.btn-set').getAttribute('data-id');
            window.location = "{{ route('aturguru.create') }}?tahunAjaranId=" + dataId;
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
                type: 'warning',
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

    <script>
        $(document).on('click', '.btn-show', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/aturguru/' + id,
                type: 'GET',
                success: function(response) {
                    // Construct the HTML content for the modal table
                    var htmlContent = '<table class="table">';
                    htmlContent +=
                        '<thead><tr><th>Kelas</th><th>Nama Guru</th><th>Email</th><th>Foto Guru</th></tr></thead>';
                    htmlContent += '<tbody>';
                    for (var i = 1; i <= 6; i++) {
                        var guruKey = 'id_guru' + i;
                        var guruId = response[guruKey];
                        if (guruId) {
                            var guru = response.users.find(user => user.id === guruId);
                            htmlContent += '<tr>';
                            htmlContent += '<td>Guru Kelas ' + i + '</td>';
                            htmlContent += '<td>' + guru.name + '</td>';
                            htmlContent += '<td>' + guru.email + '</td>';
                            htmlContent += '<td><img src="' + "{{ asset('storage/images/profile/') }}" +
                                "/" + guru.image +
                                '" alt="Foto Guru" style="max-width: 100px;"></td>';
                            htmlContent += '</tr>';
                        }
                    }
                    htmlContent += '</tbody></table>';

                    // Show the SweetAlert modal with the HTML content
                    Swal.fire({
                        title: 'Detail Guru',
                        html: htmlContent,
                        width: '80%',
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>



@stop
