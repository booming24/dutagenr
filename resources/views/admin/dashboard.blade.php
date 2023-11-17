@include('layouts.navbar')
<div id="dashboard">
    <div class="content" style="margin-left: 400px;">
        <div class="row mt-5" style="margin-left: -60px; ">
            <div class="col-lg-6">
                <div class="card" style="width: 485px; height: 210px">
                    <div class="card-header"
                        style="background-color: #418897; width: 485px; height: 37px; margin-top: -20px;">
                        Voucher Tersedia
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <h1 class="card-title">Rp {{ number_format($data['voucher_tersedia'], 0, ',', '.') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="width: 485px; height: 210px">
                    <div class="card-header"
                        style="background-color: #FF7B3D; width: 485px; height: 37px; margin-top: -20px;">
                        Voucher Terjual
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <h1 class="card-title">Rp {{ number_format($data['voucher_terjual'], 0, ',', '.') }}</h1>
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
<div id="Footer" style="display: flex; flex-direction: column;  width: 100%; ">

    <div class="konten2 mt-4"
        style="background-color: #418897; color: white; padding: 10px; width: 100%; margin-left: 0px;">
        <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project
            Palembang</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Mengambil elemen canvas untuk grafik pertama
    const canvas = document.getElementById("barChart");
    const ctx = canvas.getContext("2d");

    // Data untuk grafik pertama
    const dataPutra = {!! json_encode($data['point_putra']) !!};
    const labelsPutra = {!! json_encode($data['label_putra']) !!};

    // Konfigurasi untuk latar belakang linear gradient pada grafik pertama
    const gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
    gradient.addColorStop(1, "#0A4DA1");
    gradient.addColorStop(0, "rgba(10, 77, 161, 0)");

    // Konfigurasi grafik pertama dengan Chart.js
    const chart = new Chart(canvas, {
        type: "bar",
        data: {
            labels: labelsPutra,
            datasets: [{
                label: "Data",
                data: dataPutra,
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

    // Mengambil elemen canvas untuk grafik kedua
    const canvas2 = document.getElementById("barChart2");
    const ctx2 = canvas2.getContext("2d");

    // Data untuk grafik kedua
    const dataPutri = {!! json_encode($data['point_putri']) !!};
    const labelsPutri = {!! json_encode($data['label_putri']) !!};

    // Konfigurasi untuk latar belakang linear gradient pada grafik kedua
    const gradient2 = ctx2.createLinearGradient(0, 0, canvas2.width, 0);

    gradient2.addColorStop(1, "#FFD600");
    gradient2.addColorStop(0, "rgba(255, 214, 0, 0)");

    // Konfigurasi grafik kedua dengan Chart.js
    const chart2 = new Chart(canvas2, {
        type: "bar",
        data: {
            labels: labelsPutri,
            datasets: [{
                label: "Data",
                data: dataPutri,
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
