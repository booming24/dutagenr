<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <div id="login">
        <div class="header">
            <img src="images/logoevoting.png" alt="Logo">
        </div>

        @if (session('success'))
        <script>
            Swal.fire('Berhasil Login', '', 'success');
        </script>
        @endif

        @if (session('error'))
        <script>
            Swal.fire('Email/Password Salah', 'Silahkan Login Kembali', 'error');
        </script>
        @endif

        <div class="login-card">
            <img src="images/evoting.png" alt="Logo">
            <h2>Login</h2>
            <form action="{{route('postlogin')}}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email"> <!-- Tambahkan name="email" -->
    <input type="password" name="password" placeholder="Password"> <!-- Tambahkan name="password" -->
    <button class="login-button">Masuk</button>
</form>

        </div>
    </div>
</body>

</html>