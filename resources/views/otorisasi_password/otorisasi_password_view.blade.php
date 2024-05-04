@extends('adminlte::page')

@section('title', 'BPR Nusamba Adiwerna - Otorisasi Password')


@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Otorisasi Password</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Otorisasi Password</li>
                    </ol>

                    <div class="row pb-5 d-flex justify-content-center">
                        <div class="col-xl-12">

                            <div class="row my-3">
                                <div class="col-md-12">

                                </div>
                            </div>

                            <div class="card mb-4">

                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table id="table-device" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIP</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->nip }}</td>
                                                        {{-- aksi --}}
                                                        <td class="text-center">

                                                            <button data-user-id="{{ $user->id }}"
                                                                class="btn btn-warning btn-otor m-2">Otorisasi</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

@stop
@section('footer')

    @include('footer')
@endsection


@section('css')
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/sp-2.2.0/datatables.min.css"
        rel="stylesheet">
@endsection
@section('plugins.sweetalert2', true)
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/sp-2.2.0/datatables.min.js">
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#table-device').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        text: 'Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3] // Exclude the 4th column (Aksi)
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                            columns: [0, 1, 2, 3] // Exclude the 4th column (Aksi)
                        }
                    },

                ],
                searching: false,
                paging: true,
                'ordering': false,
                "pageLength": 30,
            });
        });
    </script>

    <script>
        // otor user
        $(document).ready(function() {
            $('.btn-otor').click(function() {
                var userId = $(this).data('user-id');

                Swal.fire({
                    title: 'Enter Password',
                    input: 'password',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: (password) => {
                        // Send AJAX request to handle password authorization
                        return fetch('/otorisasi-password/' + userId, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                body: JSON.stringify({
                                    password: password
                                })
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(response.statusText);
                                }
                                return response.json();
                            })
                            .catch(error => {
                                Swal.showValidationMessage(
                                    `Request failed: ${error}`
                                );
                            });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result && result.value && result.value.message === "Otorisasi Sukses") {
                        Swal.fire(
                            'Success!',
                            result.value.message,
                            'success'
                        ).then(() => {
                            location.reload(); // Reload the page
                        });
                    }
                });
            });
        });
    </script>

@endsection
