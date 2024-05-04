@include('wali.header')
@include('wali.navbar')
@include('wali.sidebar')


<div class="content-wrapper ">


    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <h1 class="m-0 text-dark">Dashboard Wali Murid</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">

            <section class="content ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-2">
                        </div>
                        <div class="col-lg-8 col-8">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$count}}</h3>

                                    <p>Total Presensi</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-check text-white" style="opacity: 0.4"></i>
                                </div>
                                <a href="/presensi-wali" class="small-box-footer">Info Detail <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-2">
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
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
