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


    <table border="1" class="table" style="margin-left: 0px; margin-top: 20px;" id="myTable">
        <thead style="background-color: #418897 !important;">
            <tr>
                <th>Kode Voucher</th>
                <th>Nominal</th>
                <th>Periode</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Dipakai</th>
                <th>Status</th>
                <th>Diginakan Untuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voucher as $item)
                <tr>
                    <td>{{ $item->kode_voucher }}</td>
                    <td>{{ $item->nominal }}</td>
                    <td>{{ $item->periode }}</td>
                    <td>{{ $item->created_at_wib }}</td>
                    <td>{{ $item->updated_at_wib }}</td>
                    <td>
                        @if ($item->is_used == 1)
                            <h5 style="color: red">Terpakai</h5>
                        @else
                            <h5 style="color: green">Belum dipakai</h5>
                        @endif
                    </td>
                    <td>{{ $item->nama_peserta }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    </table>
    <div id="Footer" style="display: flex; flex-direction: column; width: 100%; margin-top: 190px;">
        <div class="konten2"
            style="background-color: #418897; color: white; padding: 10px; width: 100%; margin-left: 0px;">
            <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project Palembang
            </p>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>

</html>
