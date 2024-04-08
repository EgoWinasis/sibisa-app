@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('error'))
                <x-adminlte-alert theme="warning" title="Warning">
                    <p>{{ $message }}</p>
                    <p>Perbarui profile terlebih dahulu!</p>
                </x-adminlte-alert>
            @endif
            <!-- Small boxes (Stat box) -->

            @if (Auth::user()->nip == '-' || Auth::user()->image == 'user.png')
                <div class="row">
                    <div class="col-lg-12 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="icon">
                                <i class="fas fa-lock text-white"></i>
                            </div>
                            <div class="inner">
                                <h3>Konten terkunci</h3>
                                <p>Perbarui profile terlebih dahulu</p>
                            </div>
                            <div class="small-box-footer" style="text-align: center;">
                                <a href="/profile" class="btn btn-success">Perbarui Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $countSiswa }}</h3>

                                <p>Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users text-white" style="opacity: 0.4"></i>
                            </div>
                            <a href="{{ route('siswaaktif.index') }}" class="small-box-footer">Info Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $countNilai }}</h3>

                                <p>Nilai Terinput</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-book text-white" style="opacity: 0.4"></i>
                            </div>
                            <a href="{{ route('nilaiaktif.index') }}" class="small-box-footer">Info Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
            @endif
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop
@section('footer')
    <div id="mycredit"><strong> Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi Buku Induk Siswa - Kampus Mengajar
            Angkatan 5 </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'info',
                title: 'Info',
                html: 'Selamat Datang <strong>{{ $nama }}</strong>, <br>Saat ini Anda Bertugas Menjadi Wali Kelas di <strong>Kelas {{$gurukelas}}</strong><br> untuk Tahun Ajaran <strong>{{ $tahunAjaran->tahun_ajaran }}</strong>'
            });
        });
    </script>
@endsection
