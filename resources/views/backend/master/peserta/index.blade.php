<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="10">
        <tr>
            <td>No Peserta</td>
            <td>Foto</td>
            <td>Nama Peserta</td>
            <td>Kategori</td>
            <td>Asal/Instansi</td>
            <td>Status</td>
        </tr>
        @foreach ($peserta as $item)
            <tr>
                <td>{{ $item->no_peserta }}</td>
                <td><img width=100 src="/peserta/{{ $item->foto }}" /></td>
                <td>{{ $item->nama_peserta }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->asal_instansi }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>

</html>
