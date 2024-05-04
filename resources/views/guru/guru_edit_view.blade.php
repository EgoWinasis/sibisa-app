@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('plugins.TempusDominusBs4', true)
@section('title', 'Edit Data Guru')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Guru</h1>
@stop

@section('content')

    <section class="content">
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
            <form method="POST" action="{{ route('guru.update', $guru->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Data guru Collapse -->
                    <x-adminlte-card title="Biodata Guru" class="col-md-12" theme-mode="full">
                        <div class="row">
                            {{-- input form guru --}}
                            {{-- NIP --}}
                            <div class="col-md-6">
                                <label for="nip">NIP <span class="text-danger font-italic">*wajib diisi</span></label>
                                <x-adminlte-input name="nip" class="numericInput"
                                    value="{{ old('nip') ?? $guru->nip }}">
                                </x-adminlte-input>
                            </div>
                            {{-- nama lengkap --}}
                            <div class="col-md-6">
                                <label for="nama">Nama Lengkap <span class="text-danger font-italic">*wajib
                                        diisi</span></label>
                                <x-adminlte-input name="nama" value="{{ old('nama') ?? $guru->nama }}"
                                    placeholder="Nama Lengkap" />
                            </div>
                            {{-- jenis kelamin --}}
                            @php
                                $options = ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'];
                                $selected = [old('jen_kel') ?? $guru->jen_kel];
                            @endphp
                            <x-adminlte-select name="jen_kel" label="Jenis Kelamin" fgroup-class="col-md-6">
                                <x-adminlte-options :options="$options" :selected="$selected" />
                            </x-adminlte-select>
                            {{-- tempat lahir --}}
                            <div class="col-md-6">
                                <label for="tempat_lahir">Tempat Lahir <span class="text-danger font-italic">*wajib
                                        diisi</span></label>
                                <x-adminlte-input name="tempat_lahir"
                                    value="{{ old('tempat_lahir') ?? $guru->tempat_lahir }}" placeholder="Tempat Lahir" />
                            </div>
                            {{-- tanggal lahir --}}
                            @php
                                $config = ['format' => 'YYYY-MM-DD'];
                            @endphp
                            <div class="col-md-6">
                                <label for="tgl_lahir">Tanggal Lahir <span class="text-danger font-italic">*wajib
                                        diisi</span></label>
                                <x-adminlte-input-date value="{{ old('tgl_lahir') ?? $guru->tgl_lahir }}" name="tgl_lahir"
                                    :config="$config" placeholder="Tanggal Lahir">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-danger">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>
                            {{-- Jabatan --}}
                            @php
                                $options = [
                                    'Guru' => 'Guru',
                                    'Kepala Sekolah' => 'Kepala Sekolah',
                                ];
                                $selected = [old('jabatan') ?? $guru->jabatan];
                            @endphp
                            <x-adminlte-select name="jabatan" label="Jabatan" fgroup-class="col-md-6">
                                <x-adminlte-options :options="$options" :selected="$selected" />
                            </x-adminlte-select>

                            <x-adminlte-input name="alamat" value="{{ old('alamat') ?? $guru->alamat }}" label="Alamat"
                                placeholder="Alamat" fgroup-class="col-md-6" />
                            {{-- Nomor telepon --}}
                            <x-adminlte-input name="telepon" value="{{ old('telepon') ?? $guru->telepon }}"
                                label="Nomor Telepon" placeholder="08934215464" class="numericInput"
                                fgroup-class="col-md-6">
                            </x-adminlte-input>
                            {{-- Tempat tinggal --}}
                            {{-- end input form guru --}}
                        </div>
                    </x-adminlte-card>
                    {{-- end guru collapse --}}

                    <div class="col-md-10"></div>
                    <x-adminlte-button class="btn-flat col-md-2" type="submit" label="Submit" theme="success"
                        icon="fas fa-lg fa-save" />
                </div>
            </form>


            <br>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop

{{-- footer --}}
@section('footer')
    @include('footer')
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.numericInput').on('input', function() {
                // Filter out non-numeric characters
                $(this).val(function(_, value) {
                    return value.replace(/\D/g, '');
                });
            });
        });
    </script>
@stop
