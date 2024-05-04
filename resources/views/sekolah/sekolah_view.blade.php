@extends('adminlte::page')

@section('title', 'Profile Sekolah')
@section('content_header')
    <h1>Profile Sekolah</h1>
@stop

@section('content')
    <div id="layoutSidenav">
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
                    @if (!empty($profile))
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <x-adminlte-card title="Data Profile" theme="dark" icon="fas fa-lg fa-user">
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>NAMA</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>{{ $profile->nama }}</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>ALAMAT</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>{{ $profile->alamat }}</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>DESA / KELURAHAN</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>{{ $profile->desa }}</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>KECAMATAN</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>{{ $profile->kecamatan }}</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>KOTA / KABUPATEN</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>{{ $profile->kota }}</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>PROVINSI</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>{{ $profile->provinsi }}</h6>
                                        </div>
                                    </div>

                                    <div class="row p-1 mt-4">

                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4">
                                            <a class="btn btn-primary"
                                                href="{{ route('sekolah.edit', $profile->id) }}">Edit</a>
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                </x-adminlte-card>
                            </div>
                        </div>
                    @else
                        <div class="row ">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <x-adminlte-card title="Data Profile" theme="dark" icon="fas fa-lg fa-user">
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>NAMA</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>-</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>ALAMAT</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>-</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>DESA / KELURAHAN</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>-</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>KECAMATAN</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>-</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>KOTA / KABUPATEN</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>-</h6>
                                        </div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col-sm-3">
                                            <h6>PROVINSI</h6>
                                        </div>
                                        <div class="col-sm-1">
                                            <h6>:</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <h6>-</h6>
                                        </div>
                                    </div>

                                    <div class="row p-1 mt-4">

                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4">
                                            <a class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                </x-adminlte-card>
                            </div>
                        </div>
                    @endif

                </div><!-- /.container-fluid -->
            </main>
        </div>
    </div>
    <!-- /.content -->
@stop
@section('footer')
    @include('footer')
@stop

@section('plugins.Sweetalert2', true)
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (empty($profile))
                Swal.fire({
                    title: 'Profil Sekolah Masih Kosong',
                    text: 'Mengalihkan untuk mengisi profil...',
                    icon: 'warning',
                    showCancelButton: false,
                    timer: 2000
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = '{{ route('sekolah.create') }}';
                    }
                });
            @endif
        });
    </script>


@endsection
