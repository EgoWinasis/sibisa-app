@extends('adminlte::page')

@section('title','Kelola Profile')
@section('content_header')
<h1>Edit Profile</h1>
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
                <form method="POST" action="{{ route('profile.update', $profile[0]->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <x-adminlte-card title="Edit Profile" theme="dark" icon="fas fa-lg fa-portrait">
                                <img id="image_profile" src="{{asset('storage/images/profile/'.$profile[0]->image)}}"
                                    alt="foto profile" class="rounded mx-auto d-block mt-2">
                                <x-adminlte-input-file id="imgInp" name="image" label="Foto Profile"
                                    placeholder="Choose a file...">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-lightblue">
                                            <i class="fas fa-upload"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-file>
                                <x-adminlte-input name="nip" label="NIP" placeholder="NIP"
                                    value="{{old('nip') ? old('nip') : $profile[0]->nip}}"  readonly/>
                                <x-adminlte-input name="name" label="Nama" placeholder="Nama"
                                    value="{{old('name') ? old('name') : $profile[0]->name }}" />
                                <x-adminlte-input type="email" name="email" label="Email" placeholder="Email"
                                    value="{{old('email') ? old('email') : $profile[0]->email }}" />
                               

                                <div class="row p-4">
                                    <div class="col-sm-12 text-center">
                                        <x-adminlte-button class="btn-flat col-sm-4" type="submit" label="Save Profile"
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
    <div id="mycredit"><strong> Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi Buku Induk Siswa - Kampus
            Mengajar
            Angkatan 5 </div>
@stop


@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.Sweetalert2', true)
@section('plugins.bsCustomFileInput', true)


@section('js')
<script type="text/javascript">
    imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    image_profile.src = URL.createObjectURL(file)
                }
    }
    // ttd
    imgInpTtd.onchange = evt => {
                const [file] = imgInpTtd.files
                if (file) {
                    image_ttd.src = URL.createObjectURL(file)
                }
    }
    $(document).ready(function() {
    $('#bagian').on('click', function() {
        // Check if the selected option is not the default "Select an option"
        if ($(this).val() === '-') {
            $(this).find('option[value="-"]').remove(); 
        }
    });
});

</script>
@stop