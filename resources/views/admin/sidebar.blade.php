<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <!-- <link rel="stylesheet" href="sidebar.css"> -->
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.sidebar {
    width: 250px;
    height: 100%;
    background-color: #333;
    color: white;
    position: fixed;
}

.sidebar .logo {
    width: 100%;
    text-align: center;
    padding: 20px 0;
}

.sidebar .logo img {
    width: 100px;
}

.sidebar .menu {
    padding: 20px 0;
    text-align: center;
}

.sidebar .menu h4 {
    margin: 0;
}

/* Tambahkan styling tambahan sesuai kebutuhan Anda */

    </style>
</head>
<body>
<div class="header">
            <img src="images/logoevoting.png" alt="Logo">
            @include('layouts.app')
            <div class="user-info">
                <div class="circle">
                    <img src="{{asset('images/logoduta.png')}}" alt="User">
                </div>
                <div class="name-level">
                    John Doe <br>Admin
                </div>
            </div>
        </div>
    <div class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <div class="menu">
            <h4>Home</h4>
        </div>
    </div>
</body>
</html>
