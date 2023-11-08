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
    <div id="dashboard">
        @include('layouts.navbar')
        <div class="content" style="margin-left: 400px;">
            <div class="row" style="margin-left: -170px;">
                <div class="col-lg-6">
                    <div class="card" style="width: 485px; height: 210px">
                        <div class="card-header"
                            style="background-color: #418897; width: 485px; height: 37px; margin-top: -20px;">
                            Voucher Tersedia
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rp. XXXX</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="width: 485px; height: 210px">
                        <div class="card-header"
                            style="background-color: #FF7B3D; width: 485px; height: 37px; margin-top: -20px;">
                            Voucher Terjual
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rp. XXXX</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statistik" style="margin-left: 250px;">
                <h1 class="corinthia-text">Statistik</h1>
                <p>e-Voting Duta GenRe Sumatera Selatan 2023</p>
            </div>
            <div class="cardd">
                <p>Grafik Voting</p>
                <b>Putera</b>
                <canvas id="barChart" width="200" height="90"></canvas>
            </div>
            <div class="cardd">
                <p>Grafik Voting</p>
                <b>Puteri</b>
                <canvas id="barChart2" width="200" height="90"></canvas>
            </div>
        </div>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Mengambil elemen canvas untuk grafik pertama
        const canvas = document.getElementById("barChart");
        const ctx = canvas.getContext("2d");

        // Data untuk grafik pertama
        const data = [30, 50, 80, 120, 70];

        // Konfigurasi untuk latar belakang linear gradient pada grafik pertama
        const gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
        gradient.addColorStop(1, "#0A4DA1");
        gradient.addColorStop(0, "rgba(10, 77, 161, 0)");

        // Konfigurasi grafik pertama dengan Chart.js
        const chart = new Chart(canvas, {
            type: "bar",
            data: {
                labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5"],
                datasets: [{
                    label: "Data",
                    data: data,
                    backgroundColor: gradient,
                    borderColor: "transparent",
                    borderRadius: 20,
                    barThickness: 31, // Atur tinggi bar
                    maxBarThickness: 658, // Atur lebar bar
                    categoryPercentage: 0.2,
                }],
            },
            options: {
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>

    <script>
        // Mengambil elemen canvas untuk grafik kedua
        const canvas2 = document.getElementById("barChart2");
        const ctx2 = canvas2.getContext("2d");

        // Data untuk grafik kedua
        const data2 = [20, 40, 60, 90, 50];

        // Konfigurasi untuk latar belakang linear gradient pada grafik kedua
        const gradient2 = ctx2.createLinearGradient(0, 0, canvas2.width, 0);

        gradient2.addColorStop(1, "#FFD600");
        gradient2.addColorStop(0, "rgba(255, 214, 0, 0)");

        // Konfigurasi grafik kedua dengan Chart.js
        const chart2 = new Chart(canvas2, {
            type: "bar",
            data: {
                labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5"],
                datasets: [{
                    label: "Data",
                    data: data2,
                    backgroundColor: gradient2,
                    borderColor: "transparent",
                    borderRadius: 20,
                    barThickness: 31, // Atur tinggi bar
                    maxBarThickness: 658, // Atur lebar bar
                    categoryPercentage: 0.2,
                }],
            },
            options: {
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
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
