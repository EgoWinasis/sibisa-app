@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('plugins.TempusDominusBs4', true)
@section('title', 'Pengaturan Siswa Manual')

@section('content_header')
    <h1 class="m-0 text-dark">Pengaturan Siswa Manual</h1>
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
            <form method="POST" action="{{ route('atursiswa.storeManual') }}">
                @csrf



                <!-- Data siswa Collapse -->
                <x-adminlte-card class="col-md-12" theme-mode="full">
                    <div class="row">
                        <div class="col-md-12">

                            <x-adminlte-select name="tahun" label="Tahun Ajaran" fgroup-class="col-md-12">
                                @foreach ($tahunAjaran as $tahun)
                                    <option value="{{ $tahun->id }}">{{ $tahun->tahun_ajaran }}</option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                        @php
                            $options = ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => 'Lulus'];
                            if (!empty(old('kelas'))) {
                                $selected = [old('kelas')];
                            } else {
                                $selected = ['1'];
                            }
                        @endphp
                        <x-adminlte-select name="kelas" value="{{ old('kelas') }}" label="Kelas"
                            fgroup-class="col-md-12">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        <div class="col-md-12">
                            <x-adminlte-select name="siswa" label="Siswa" fgroup-class="col-md-12">
                                @foreach ($siswa as $datasiswa)
                                    <option value="{{ $datasiswa->id }}">{{ $datasiswa->nama_lengkap }}</option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>




                    <div class="row mt-2">
                        <div class="col-md-12 text-center">
                            <div class="row mt-2">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-adminlte-card>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'info',
                title: 'Import Data Siswa',
                text: 'Sebelum impor data siswa, Pastikan data siswa sudah terinput di master data siswa.',
            });
        });
        document.getElementById('excel-file').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var label = document.querySelector('.custom-file-label');
            label.innerText = fileName;
        });

        function handleFile(event) {
            event.preventDefault(); // Prevent the default form submission behavior

            const fileInput = document.getElementById('excel-file');
            const file = fileInput.files[0];

            if (!file) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select a file.'
                });
                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, {
                    type: 'array'
                });

                // Assume the first sheet contains the student data
                const sheetName = workbook.SheetNames[0];
                const sheet = workbook.Sheets[sheetName];

                // Convert the sheet to JSON
                const students = XLSX.utils.sheet_to_json(sheet);

                // Clear existing table data
                const tableBody = document.getElementById('students-table').getElementsByTagName('tbody')[0];
                tableBody.innerHTML = '';

                // Populate the table with the student data
                let rowNum = 1; // Initialize row number

                if (students.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please upload an Excel file with student data.'
                    });
                    return;
                }

                students.forEach(student => {
                    const row = tableBody.insertRow();
                    row.insertCell().innerText = rowNum++; // Increment and display row number
                    row.insertCell().innerText = student['nis'];
                    row.insertCell().innerText = student['nisn'];
                    row.insertCell().innerText = student['nama'];
                });
            };

            reader.readAsArrayBuffer(file);
        }


        function submitForm() {
            // Check if there are any rows in the table
            const table = document.getElementById('students-table');
            if (table.rows.length <= 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please upload an Excel file with student data.',
                });
                return;
            }

            // Serialize the table data
            const data = Array.from(table.rows).slice(1).map(row => ({
                no: row.cells[0].textContent,
                nis: row.cells[1].textContent,
                nisn: row.cells[2].textContent,
                nama: row.cells[3].textContent
            }));

            // Set the serialized data to the hidden input field
            document.getElementById('students_data').value = JSON.stringify(data);

            // Submit the form
            document.querySelector('form').submit();
        }
    </script>

@stop
