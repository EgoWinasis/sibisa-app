@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('plugins.TempusDominusBs4', true)
@section('title', 'Pengaturan Siswa Tahun Ajaran {{ $tahunAjaran->tahun_ajaran }}')

@section('content_header')
    <h1 class="m-0 text-dark">Pengaturan Siswa Tahun Ajaran {{ $tahunAjaran->tahun_ajaran }}</h1>
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
            <form method="POST" action="{{ route('atursiswa.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">



                    <!-- Data siswa Collapse -->
                    <x-adminlte-card class="col-md-12" theme-mode="full">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="show_tahun">Tahun Ajaran</label>
                                <x-adminlte-input name="show_tahun" placeholder="{{ $tahunAjaran->tahun_ajaran }}"
                                    type="text" readonly />
                            </div>
                            <div class="col-md-12">
                                <label for="show_kelas">Kelas</label>
                                <x-adminlte-input name="show_kelas" placeholder="{{ $kelas }}" type="text"
                                    readonly />
                            </div>
                            <input type="hidden" name="tahun_ajaran" value="{{ $tahunAjaran->id }}">
                            <input type="hidden" name="kelas" value="{{ $kelas }}">
                            <input type="hidden" name="students_data" id="students_data">

                            <div class="col-md-12">
                                <table id="students-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td colspan="4" class="text-center">
                                            No data available
                                        </td>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="excel-file" accept=".xls,.xlsx">
                                        <label class="custom-file-label" for="excel-file">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button"
                                            onclick="handleFile(event)">Upload</button>
                                            <a class="btn btn-success" title="Download Template" href="{{ asset('storage/template-kelas.xlsx') }}" download><i class="fas fa-file-excel"></i></a>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12 text-center">
                                <div class="row mt-2">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-success" onclick="submitForm()">Submit Data</button>
                                    </div>
                                </div>
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
