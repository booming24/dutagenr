<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

    <div class="header">
        <img src="{{ asset('images/logoevoting.png') }}" alt="Logo">
        @include('layouts.app')
    </div>

   
    <script>
        $(document).ready(function() {
            const carousel1 = $("#carousel1");
            const carouselCards1 = carousel1.find(".carousel-card");
            const prevButton1 = $("#prev");
            const nextButton1 = $("#next");
            let currentIndex1 = 0;

            nextButton1.click(function() {
                carouselCards1.eq(currentIndex1).hide();
                currentIndex1 = (currentIndex1 + 1) % carouselCards1.length;
                carouselCards1.eq(currentIndex1).show();
            });

            prevButton1.click(function() {
                carouselCards1.eq(currentIndex1).hide();
                currentIndex1 = (currentIndex1 - 1 + carouselCards1.length) % carouselCards1.length;
                carouselCards1.eq(currentIndex1).show();
            });
        });
    </script>
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
        document.getElementById('notification-icon').addEventListener('click', function() {

            clearNotifications();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
