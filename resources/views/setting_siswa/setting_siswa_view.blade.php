@extends('adminlte::page')

@section('title', 'Pengaturan Siswa')
@section('content_header')
    <h1>Pengaturan Siswa</h1>
@stop

@section('content')
    <div id="layoutSidenav" style="min-height: 500px">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            @if ( isset($message['deleted_count']))
                            <p>Total data: {{ $message['total_students'] }}, Data siswa ditambahkan ke kelas:
                                {{ $message['registered_count'] }}, Data siswa tidak ditambahkan ke kelas:
                                {{ $message['not_registered_count'] }}, Data siswa dihapus dari Kelas: {{$message['deleted_count']}}</p>
                            @else
                            {{ $message['success_message'] }}
                            <p>Total data: {{ $message['total_students'] }}, Data siswa terdaftar:
                                {{ $message['registered_count'] }}, Data siswa tidak terdaftar:
                                {{ $message['not_registered_count'] }}</p>
                            @endif
                          
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
                                        <th class="text-center">Pilih Siswa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($tahun_ajaran as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td class="nama">{{ $data->tahun_ajaran }}</td>
                                            <td class="text-center">
                                                @for ($i = 1; $i <= 7; $i++)
                                                    @php
                                                        $exists = App\Models\ModelSettingSiswa::where(
                                                            'id_tahun_ajaran',
                                                            $data->id,
                                                        )
                                                            ->where('kelas', $i)
                                                            ->exists();
                                                    @endphp
                                                    @if ($exists)
                                                        @if ($i == 7)
                                                            <a class="btn btn-success btn-set" onclick="add(this)"
                                                                data-id="{{ $data->id }}"
                                                                data-kelas="{{ $i }}">{{ 'Lulus' }}</a>
                                                        @else
                                                            <a class="btn btn-success btn-set" onclick="add(this)"
                                                                data-id="{{ $data->id }}"
                                                                data-kelas="{{ $i }}">{{ $i }}</a>
                                                        @endif
                                                    @else
                                                        @if ($i == 7)
                                                            <a class="btn btn-primary btn-set" onclick="add(this)"
                                                                data-id="{{ $data->id }}"
                                                                data-kelas="{{ $i }}">{{ "Lulus" }}</a>
                                                        @else
                                                            <a class="btn btn-primary btn-set" onclick="add(this)"
                                                                data-id="{{ $data->id }}"
                                                                data-kelas="{{ $i }}">{{ $i }}</a>
                                                        @endif
                                                    @endif
                                                @endfor

                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>


                        </div>

                        <div class="col-md-12 my-5">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <h6 class="font-weight-bold">Keterangan : </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;">
                                            <a class="btn btn-success w-300 h-100"></a>
                                        </td>
                                        <td>:</td>
                                        <td>Data Sudah Tersedia</td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;">
                                            <a class="btn btn-primary w-300 h-100"></a>
                                        </td>
                                        <td>:</td>
                                        <td>Data Belum Tersedia</td>
                                    </tr>
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
        function add(element) {
            var dataId = element.getAttribute('data-id');
            var dataKelas = element.getAttribute('data-kelas');
            window.location = "{{ route('atursiswa.create') }}?id=" + dataId + "&kelas=" + dataKelas;
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
                            htmlContent += '<td><img src="' +
                                "{{ asset('storage/images/profile/') }}" +
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
