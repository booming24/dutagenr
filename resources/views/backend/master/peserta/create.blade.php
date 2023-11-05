<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('create_peserta') }}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="text" name="no_peserta" placeholder="No Peserta">
        <input type="file" name="foto" placeholder="Upload Foto">
        <input type="text" name="nama_peserta" placeholder="Nama Peserta">
        <select name="kategori" id="kategori">
            <option value="PUTRA">Putra</option>
            <option value="PUTRI">Putri</option>
        </select>
        <input type="text" name="asal_instansi" placeholder="Asal stainnsi">
        <select name="status" id="status">
            <option value="PESERTA">Peserta</option>
            <option value="SEMIFINALIS">Semifinalis</option>
            <option value="FINALIS">Finalis</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
