@extends('adminlte::page')

@section('title', 'Profile Sekolah')
@section('content_header')
    <h1>Edit Profil Sekolah</h1>
@stop

@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('sekolah.update', $sekolah->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <x-adminlte-card title="Edit Profile Sekolah" theme="dark" icon="fas fa-lg fa-portrait">
                                    <x-adminlte-input type="text" name="nama" label="Nama Sekolah"
                                        :value="old('nama') ?? $sekolah->nama" />
                                    <x-adminlte-input type="text" name="alamat" label="Alamat" :value="old('alamat') ?? $sekolah->alamat" />
                                    <x-adminlte-input type="text" name="desa" label="Desa / Kelurahan"
                                        :value="old('desa') ?? $sekolah->desa" />
                                    <x-adminlte-input type="text" name="kecamatan" label="Kecamatan" :value="old('kecamatan') ?? $sekolah->kecamatan" />
                                    <x-adminlte-input type="text" name="kota" label="Kota / Kabupaten"
                                        :value="old('kota') ?? $sekolah->kota" />
                                    <x-adminlte-input type="text" name="provinsi" label="Provinsi" :value="old('provinsi') ?? $sekolah->provinsi" />



                                    <div class="row p-4">
                                        <div class="col-sm-12 text-center">
                                            <x-adminlte-button class="btn-flat col-sm-4" type="submit" label="Save"
                                                theme="success" icon="fas fa-lg fa-save" />
                                        </div>
                                    </div>

                                </x-adminlte-card>
                            </div>
                        </div>
                    </form>

                </div><!-- /.container-fluid -->
            </main>
        </div>
    </div>
    <!-- /.content -->
@stop

@section('footer')
    @include('footer')
@stop
