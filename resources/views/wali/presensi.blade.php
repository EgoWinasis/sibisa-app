@include('wali.header')
@include('wali.navbar')
@include('wali.sidebar')


<div class="content-wrapper ">


    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <h1 class="m-0 text-dark">Presensi Murid</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">

            <section class="content ">
                <div class="container-fluid">
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
                                        $i=1;
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
        </div>
    </div>

</div>


<footer class="main-footer">
    <div id="mycredit">
        <strong> Copyright &copy; 2023-2024 Sistem Informasi Buku Induk Siswa - Kampus
            Mengajar
            Angkatan 5
        </strong>
    </div>
</footer>


</div>


<script src="http://sibisa-app.test/vendor/jquery/jquery.min.js"></script>
<script src="http://sibisa-app.test/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://sibisa-app.test/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="http://sibisa-app.test/vendor/adminlte/dist/js/adminlte.min.js"></script>


<script src="http://sibisa-app.test/vendor/datatables/js/jquery.dataTables.min.js"></script>







<script src="http://sibisa-app.test/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>





















<script src="http://sibisa-app.test/vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js"></script>







<script src="http://sibisa-app.test/vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js"></script>







<script src="http://sibisa-app.test/vendor/datatables-plugins/buttons/js/buttons.html5.min.js"></script>







<script src="http://sibisa-app.test/vendor/datatables-plugins/buttons/js/buttons.print.min.js"></script>







<script src="http://sibisa-app.test/vendor/datatables-plugins/jszip/jszip.min.js"></script>







<script src="http://sibisa-app.test/vendor/datatables-plugins/pdfmake/pdfmake.min.js"></script>







<script src="http://sibisa-app.test/vendor/datatables-plugins/pdfmake/vfs_fonts.js"></script>



































<script src="http://sibisa-app.test/vendor/bs-custom-file-input/bs-custom-file-input.min.js"></script>














<script src="http://sibisa-app.test/vendor/sweetalert2/sweetalert2.min.js"></script>









































<script type="text/javascript">
    function add() {
        window.location = "http://sibisa-app.test/presensi/create";
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

</body>

</html>
