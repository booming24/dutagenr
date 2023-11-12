<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <style>
        .table {
            margin-left: 320px;
            margin-top: 20px;
            width: 1000px;
            border-collapse: collapse;
            /* Menghapus jarak antara sel-sel tabel */
        }

        .table-header {
            background-color: #418897 !important;
            color: white;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            /* Tambahkan garis tepi */
            padding: 8px;
            /* Tambahkan ruang antara teks dan garis tepi */
        }

        /* Membuat garis horizontal hanya pada elemen <tr> dalam <tbody> */
        .table tbody tr {
            border-top: 1px solid #000;
        }

        /* Membuat garis vertikal hanya pada elemen <td> */
        .table td {
            border-right: 1px solid #000;
        }

        /* Menghilangkan garis tepi pada sudut kanan bawah */
        .table th:last-child,
        .table td:last-child {
            border-right: none;
        }
    </style>
</head>

<body>
    <div id="peserta">
        @include('layouts.navbar')
    </div>
    <button type="button" class="btn btn-primary mb-2 mt-4" style="width: 120px; margin-left: 320px;"
        data-bs-toggle="modal" data-bs-target="#modal">
        <i class="bi bi-plus"></i> Voucher
    </button>
    <!-- Modal -->
    <div class="modal modal-lg fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white"
                    style="border-radius: 10px; background-color: #418897 !important;">
                    <h5 class="modal-title">Tambah Voucher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulir di sini -->
                    <form action="{{ route('voucher-store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="nominal" class="form-label">Nominal</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nominal" id="nominal" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="periode" class="form-label">Periode</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="periode" id="periode" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="jumlah_voucher" class="form-label">Jumlah Voucher</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="jumlah_voucher" id="jumlah_voucher" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <table border="1" class="table" id="myTable">
        <thead style="background-color: #418897 !important;">
            <tr>
                <th>Kode Voucher</th>
                <th>Nominal</th>
                <th>Periode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voucher as $item)
                <tr>
                    <td>{{ $item->kode_voucher }}</td>
                    <td>{{ $item->nominal }}</td>
                    <td>{{ $item->periode }}</td>
                    <td>{{ $item->is_used }}</td>
                    <td> <a href="" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" style="margin-top: -0px;" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></a>
                        <a href="{{ route('voucher-delete', $item->id) }}"
                            onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger"><i
                                class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    </table>
    <div id="Footer" style="display: flex; flex-direction: column; width: 100%; margin-top: 290px;">
        <div class="konten2"
            style="background-color: #418897; color: white; padding: 10px; width: 100%; margin-left: 0px;">
            <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project Palembang
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>

</html>
