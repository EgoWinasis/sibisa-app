@extends('adminlte::page')

@section('title','Kelola Profile')
@section('content_header')
<h1>Kelola Profile</h1>
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
                <div class="row">

                    <div class="col-sm-4">
                        <x-adminlte-card title="Foto Profile" theme="dark" icon="fas fa-lg fa-portrait">
                            <img src="{{asset('storage/images/profile/'.$profile[0]->image)}}" alt="foto profile"
                                class="rounded mx-auto d-block" width="200px">
                        </x-adminlte-card>
                    </div>
                    <div class="col-sm-8">
                        <x-adminlte-card title="Data Profile" theme="dark" icon="fas fa-lg fa-user">
                            <div class="row p-1">
                                <div class="col-sm-3">
                                    <h6>NIP</h6>
                                </div>
                                <div class="col-sm-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-sm-8">
                                    <h6>{{$profile[0]->nip}}</h6>
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="col-sm-3">
                                    <h6>Nama</h6>
                                </div>
                                <div class="col-sm-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-sm-8">
                                    <h6>{{$profile[0]->name}}</h6>
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="col-sm-3">
                                    <h6>Email</h6>
                                </div>
                                <div class="col-sm-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-sm-8">
                                    <h6>{{$profile[0]->email}}</h6>
                                </div>
                            </div>
                          
                            <div class="row p-1 mt-4">

                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <a class="btn btn-primary" href="{{ route('profile.edit',$profile[0]->id) }}">Edit
                                        Profile</a>
                                </div>
                                <div class="col-sm-4">
                                </div>
                            </div>
                        </x-adminlte-card>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </main>
    </div>
</div>
<!-- /.content -->
@stop
@section('footer')
   @include('footer')
@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.Sweetalert2', true)

@section('js')

@stop