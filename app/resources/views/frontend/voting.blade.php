@extends('fLayout')

@section('content')
<div id="voting">
    <div class="statistik">
        <h1 class="corinthia-text">Statistik</h1>
        <p>e-Voting Duta GenRe Sumatera Selatan 2023</p>
    </div>
    <div class="card">
        <div class="circles">
            <div class="circle">
                <img src="gambar1.jpg" alt="Gambar 1">
            </div>
            <div class="circle">
                <img src="gambar2.jpg" alt="Gambar 2">
            </div>
        </div>
        <div class="small-circles mt-4">
            <div class="small-circle">
                <img src="gambar3.jpg" alt="Gambar 3">
            </div>
            <div class="small-circle ">
                <img src="gambar4.jpg" alt="Gambar 4">
            </div>
            <div class="small-circle ml-5">
                <img src="gambar5.jpg" alt="Gambar 5">
            </div>
            <div class="small-circle">
                <img src="gambar6.jpg" alt="Gambar 6">
            </div>
        </div>
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
    <div class="row">
        <div class="col-lg-6">
            <div class="carddd">
                <div class="carousel-container">
                    <div class="carousel" id="carousel1">
                        <div class="carousel-card">
                            <img src="images/forum.png" alt="Slide 1">
                            <div class="card-info">
                                <p>000 - Lorem ipsum dolor</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                                    vote
                                </button>
                                <a href="#" class="see-all">See All</a>
                            </div>
                        </div>
                        <div class="carousel-card">
                            <img src="images/dugen.png" alt="Slide 2">
                            <div class="card-info">
                                <p>001 - Lorem ipsum dolor</p>
                                <button class="vote-button" type="button" data-bs-toggle="modal" data-bs-target="#modal">Vote</button>
                                <a href="#" class="see-all">See All</a>
                            </div>
                        </div>
                        <!-- Tambahkan card sesuai kebutuhan -->
                    </div>
                    <button id="prev" class="carousel-control left">&lt;</button>
                    <button id="next" class="carousel-control right">&gt;</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="carddd">
                <div class="carousel-container">
                    <div class="carousel" id="carousel2">
                        <div class="carousel-card">
                            <img src="images/forum.png" alt="Slide 1">
                            <div class="card-info">
                                <p>002 - Lorem ipsum dolor</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                                    vote
                                </button>
                                <a href="#" class="see-all">See All</a>
                            </div>
                        </div>
                        <div class="carousel-card">
                            <img src="images/dugen.png" alt="Slide 2">
                            <div class="card-info">
                                <p>003 - Lorem ipsum dolor</p>
                                <button class="vote-button" type="button" data-bs-toggle="modal" data-bs-target="#modal">Vote</button>
                                <a href="#" class="see-all">See All</a>
                            </div>
                        </div>
                        <!-- Tambahkan card sesuai kebutuhan -->
                    </div>
                    <button id="prev2" class="carousel-control left">&lt;</button>
                    <button id="next2" class="carousel-control right">&gt;</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 971px; height: 472px;">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white" style="border-radius: 0;">
                    <h1 class="modal-title fs-5">Participant Info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="display: flex; align-items: center;">
                    <div class="cardddd">
                        <img src="images/dugen.png" alt="Participant Image" width="245" height="307">
                    </div>
                    <div class="voucher-info ml-3">
                        <p>000</p>
                        <p>Lorem ipsum dolor</p>
                        <p>Kode Voucher</p>
                        <input type="text" class="form-control" id="voucherCode">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id="myModalVoteInput" value="Vote">

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $("#myModalVoteInput").click(function() {
                Swal.fire({
                    title: 'Apakah Anda yakin Vote Peserta',
                    text: 'Vote Peserta\n000 - Lorem ipsum dolor',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Vote Berhasil!', '', 'success');
                    }
                });
            });


            // Menutup modal saat tombol "Tutup" atau ikon "X" ditekan
            $("#closeButton, #modal .close").click(function() {
                $("#modal").modal("hide");
            });
        });
    </script>



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
        $(document).ready(function() {
            const carousel2 = $("#carousel2");
            const carouselCards2 = carousel2.find(".carousel-card");
            const prevButton2 = $("#prev2");
            const nextButton2 = $("#next2");
            let currentIndex2 = 0;

            nextButton2.click(function() {
                carouselCards2.eq(currentIndex2).hide();
                currentIndex2 = (currentIndex2 + 1) % carouselCards2.length;
                carouselCards2.eq(currentIndex2).show();
            });

            prevButton2.click(function() {
                carouselCards2.eq(currentIndex2).hide();
                currentIndex2 = (currentIndex2 - 1 + carouselCards2.length) % carouselCards2.length;
                carouselCards2.eq(currentIndex2).show();
            });
        });
    </script>


</div>
@endsection