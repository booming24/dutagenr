<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mobile.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #login {
            flex: 1;
        }
    </style>

</head>

<body>
    <div id="login">
        <div class="header">
            <img src="images/logoevoting.webp" alt="Logo">
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
            <img src="images/evoting.webp" alt="Logo">
            <h2 style="margin-top: 20px;">Login</h2>
            <form action="{{ route('postlogin') }}" method="POST">
                @csrf
                <div class="center-input">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="center-button">
                    <button class="login-button">Masuk</button>
                </div>
            </form>
        </div>

    </div>
    <div id="Footer" style="display: flex; flex-direction: column;  width: 100%; ">

        <div class="konten2"
            style="background-color: #418897; color: white; padding: 10px; width: 100%; margin-left: 0px;">
            <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project
                Palembang</p>
        </div>
    </div>
</body>

</html>
