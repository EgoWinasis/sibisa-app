@extends('adminlte::page')


@section('title', 'Cetak Data')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <h1 class="m-0 text-dark">Cetak Data</h1>
        </div>
    </div>
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row my-3">
                <button ctype="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Cetak
                    Cover</button>

            </div>

            <div class="row">

                <div class="col-md-12 mb-5">

                    <table id="table_kelas" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Biodata</th>
                                <th>Nilai</th>
                                <th>Kompetensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($siswa as $isi)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $isi->nis }}</td>
                                    <td>{{ $isi->nama_lengkap }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('cetak.biodata', $isi->id) }}" target="_blank"
                                            class="btn btn-success"><i class="fa fa-user"></i></a>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $kelas = DB::table('class')
                                                ->select('id', 'id_siswa', 'kelas', 'tinggal_kelas', 'tahun_ajaran')
                                                ->where('id_siswa', $isi->id)
                                                ->where('kelas', $gurukelas)
                                                ->where('tahun_ajaran', '!=', null)
                                                ->where('tahun_ajaran', '=', $tahunAjaranAktif->tahun_ajaran)
                                                ->orderBy('kelas', 'asc')
                                                ->get();

                                        @endphp

                                        @foreach ($kelas as $item)
                                            @php
                                                $nilai = DB::table('ketidakhadiran')
                                                    ->select('id')
                                                    ->where('siswa', $isi->nama_lengkap)
                                                    ->where('kelas', $item->kelas)
                                                    ->where('tahun_ajaran', $item->tahun_ajaran)
                                                    ->first();

                                            @endphp
                                            @if (empty($nilai))
                                                <a class="btn btn-info btn-kelas-empty"  style="cursor: not-allowed;opacity: 0.5;">{{ $item->kelas }}</a>
                                            @else
                                                @if ($item->tinggal_kelas == 'false')
                                                    <a href="{{ route('cetak.nilai', $nilai->id) }}" target="_blank"
                                                        class="btn btn-info btn-kelas">{{ $item->kelas }}</a>
                                                @else
                                                    <a href="{{ route('cetak.nilai', $nilai->id) }}" target="_blank"
                                                        class="btn btn-warning btn-kelas">{{ $item->kelas }}</a>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>

                                    {{-- cetak Kompetensi --}}
                                    @php
                                        $kompetensi = DB::table('kompetensi')
                                            ->select('id', 'id_siswa')
                                            ->where('id_siswa', $isi->id)
                                            ->first();
                                    @endphp

                                    @if (empty($kompetensi))
                                        <td class="text-center">
                                            <a class="btn btn-dark btn-kompetensi "  style="cursor: not-allowed;opacity: 0.5;"><i class="fa fa-trophy"></i></a>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <a href="{{ route('cetak.kompetensi', $kompetensi->id) }}" target="_blank"
                                                class="btn btn-dark"><i class="fa fa-trophy"></i></a>
                                        </td>
                                    @endif


                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select class="form-control" id="tahun_cetak" name="tahun_cetak">
                            @foreach ($tahunAjaran as $tahun)
                                <option value="{{ $tahun->tahun_ajaran }}" {{ $tahun->status == 1 ? 'selected' : '' }}>
                                    {{ $tahun->tahun_ajaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <a href="{{ route('cetak.cover') }}" id="btn-cetak" target="_blank"
                            class="btn btn-primary">Cetak</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@stop


@section('footer')
    @include('footer')
@stop

@section('js')
    <script type="text/javascript">
        $(function() {
            $("#table_kelas").DataTable({
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
                "responsive": true
            }).buttons().container().appendTo('#table_kelas_wrapper .col-md-6:eq(0)');

        });

        $(document).on('click', '#btn-cetak', function(e) {

            var tahun_cetak = $('#tahun_cetak').val();

            if (tahun_cetak == "") {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Tahun Ajaran tidak boleh kosong!"
                })
            } else {

                var expiryDate = new Date();
                expiryDate.setTime(expiryDate.getTime() + (300000)); // 1 hour
                document.cookie = `tahun_cetak=${tahun_cetak}; expires=${expiryDate}`;
            }


        });


        $(document).on('click', '.btn-kelas-empty', function(e) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Data Nilai Siswa Belum Di-Input"
            })

        });



        $(document).on('click', '.btn-kompetensi', function(e) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Data Kompetensi Siswa Belum Di-Input"
            })

        });

        $(document).on('click', '.btn-ijazah', function(e) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Data Ijazah Siswa Belum Di-Input"
            })

        });

        $(document).on('click', '.btn-cetak-ijazah', function(e) {
            e.preventDefault();

            var ijazah = $(this).data('ijazah');
            var skl = $(this).data('skl');
            var skhun = $(this).data('skhun');


            if (ijazah != '0') {

                window.open(
                    $(this).data('href'),
                    '_blank' // <- This is what makes it open in a new window.
                );
            }
            if (skl != '0') {
                window.open(
                    $(this).data('href_skl'),
                    '_blank' // <- This is what makes it open in a new window.
                );
            }
            if (skhun != '0') {
                window.open(
                    $(this).data('href_skhun'),
                    '_blank' // <- This is what makes it open in a new window.
                );
            }


        });
    </script>


@stop
