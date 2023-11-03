<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
    <div id="dashboard">
        <div class="header">
            <img src="images/logoevoting.png" alt="Logo">
            @include('layouts.app')
            <div class="notification-bell">

            <i class="bi bi-bell-fill" id="notification-icon"></i>
            <span class="badge" id="notification-count">0</span>
        </div>
            <div class="user-info">
                <div class="circle">
                    <img src="{{asset('images/logoduta.png')}}" alt="User">
                </div>
                <div class="name-level">
                    John Doe <br>Admin
                </div>
            </div>
        </div>
    </div>
    <script>
    // Inisialisasi jumlah notifikasi
    let notificationCount = 0;

    // Fungsi untuk menambah notifikasi
    function addNotification() {
        notificationCount++;
        document.getElementById('notification-count').innerText = notificationCount;
    }

    // Fungsi untuk menghapus notifikasi
    function clearNotifications() {
        notificationCount = 0;
        document.getElementById('notification-count').innerText = notificationCount;
    }
    document.getElementById('notification-icon').addEventListener('click', function () {
 
        clearNotifications();
    });
</script>

</body>
</html>
