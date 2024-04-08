@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('plugins.TempusDominusBs4', true)
@section('title', 'Pengaturan Guru Tahun Ajaran '.$tahunAjaran->tahun_ajaran)

@section('content_header')
    <h1 class="m-0 text-dark">Ubah Pengaturan Guru Tahun Ajaran {{$tahunAjaran->tahun_ajaran}}</h1>
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
            <form method="POST" action="{{ route('aturguru.update', $guru->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Data siswa Collapse -->
                    <x-adminlte-card class="col-md-12" theme-mode="full">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                <x-adminlte-input name="show_tahun" value="{{$tahunAjaran->tahun_ajaran}}" type="text" readonly />
                            </div>
                            <input type="hidden" name="tahun_ajaran" value="{{ $tahunAjaran->id }}">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="col-md-12">
                                    <label for="guru{{ $i }}">Guru Kelas {{ $i }}</label>
                                    <select name="guru{{ $i }}" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if($guru->{'id_guru'.$i} == $user->id) selected @endif>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endfor
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 text-center">
                                <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                                    icon="fas fa-lg fa-save" />
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
    <div class="mt-2" id="mycredit"><strong> Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi Buku Induk Siswa - Kampus Mengajar Angkatan 5 </div>
@stop