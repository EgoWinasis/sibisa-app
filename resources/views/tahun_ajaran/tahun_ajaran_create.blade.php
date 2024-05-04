@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('plugins.TempusDominusBs4', true)
@section('title', 'Tambah Tahun Ajaran')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Tahun Ajaran</h1>
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
        <form method="POST" action="{{ route('tahunajaran.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">



                <!-- Data siswa Collapse -->
                <x-adminlte-card class="col-md-12" theme-mode="full">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                            <x-adminlte-input name="tahun_ajaran" value="{{ old('tahun_ajaran') }}" placeholder="Contoh : 2023/2024" type="text" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save" />
                        </div>
                    </div>
                </x-adminlte-card>
                

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

