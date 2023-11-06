<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
   

    <table border="1" class="table" style="margin-left: 320px; margin-top: 20px; width: 1000px;">
        <thead style="background-color: #418897 !important;">
            <tr>
                <th>NO</th>
                <th>NAMA PESERTA</th>
                <th>TOTAL VOUCHER</th>
                <th>PERSENTASE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peserta as $item)
            <tr>
                <td>{{ $item->no_peserta }}</td>
                <td>{{ $item->nama_peserta }}</td>
                <td></td>
                <td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>

</html>