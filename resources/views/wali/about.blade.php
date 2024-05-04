@include('wali.header')
@include('wali.navbar')
@include('wali.sidebar')


<div class="content-wrapper ">


    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <h1 class="m-0 text-dark">Tentang Kami</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">

            <section class="content ">
                <div class="container-fluid">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('/storage/images/about/fotbar2.jpg') }}"
                                    alt="Foto Bersama FKKS">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>TIM KAMPUS MENGAJAR ANGKATAN 5</h5>
                                    <p>SDN GETASKEREP 01</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/storage/images/about/Ego.png') }}"
                                    alt="Foto Ego">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Ego Winasis</h5>
                                    <p>Politeknik Harapan Bersama Tegal</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/storage/images/about/Dona.png') }}"
                                    alt="Foto Dona">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Dona Safitri</h5>
                                    <p>Universitas Negeri Semarang</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/storage/images/about/Sip.png') }}"
                                    alt="Foto Syifa">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Fatih Azhar Syifani</h5>
                                    <p>Universitas Negeri Semarang</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/storage/images/about/Winda.png') }}"
                                    alt="Foto Winda">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Winda Mirtasya Utami</h5>
                                    <p>Universitas Negeri Semarang</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/storage/images/about/Wina.png') }}"
                                    alt="Foto Wina">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Wina Sabita Al Jauziah</h5>
                                    <p>Universitas Singaperbangsa Karawang</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
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



<script type="text/javascript">
    var myCarousel = document.querySelector('#carouselExampleCaptions')
    var carousel = new bootstrap.Carousel(myCarousel)
</script>



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
