@extends('fLayout')

@section('content')
<div id="voting">
    <div class="statistik mt-3">
        <h1 class="corinthias-text">Statistik</h1>
        <p class="evoting-text">e-Voting Duta GenRe Sumatera Selatan 2023</p>
    </div>
    <div class="container">
        <div>
            <h3 class="top3-text text-center">TOP 3</h3>
            <div class="circles">
                <div class="circle">
                    <img class="mh-100" src="/peserta/{{ $top_three_putra[0]->foto }}" alt="Gambar 1">

                </div>
                <div class="circle">
                    <img class="mh-100" src="/peserta/{{ $top_three_putri[0]->foto }}" alt="Gambar 2">
                </div>
            </div>
            <div class="circles mt-3">
                <div class="circle">
                    <img class="mh-100" src="/peserta/{{ $top_three_putra[1]->foto }}" alt="Gambar 1">
                </div>
                <div class="circle">
                    <img class="mh-100" src="/peserta/{{ $top_three_putri[1]->foto }}" alt="Gambar 2">
                </div>
            </div>
            <div class="circles mt-3">
                <div class="circle">
                    <img class="mh-100" src="/peserta/{{ $top_three_putra[2]->foto }}" alt="Gambar 1">
                </div>
                <div class="circle">
                    <img class="mh-100" src="/peserta/{{ $top_three_putri[2]->foto }}" alt="Gambar 2">
                </div>
            </div>
            <!-- <div class="small-circles mt-4">
                <div class="small-circle">
                    <img class="mh-100" src="/peserta/{{ $top_three_putra[1]->foto }}" alt="Gambar 1">
                </div>
                <div class="small-circle ">
                    <img class="mh-100" src="/peserta/{{ $top_three_putri[1]->foto }}" alt="Gambar 2">
                </div>
                <div class="small-circle ml-5">
                    <img class="mh-100" src="/peserta/{{ $top_three_putra[2]->foto }}" alt="Gambar 1">
                </div>
                <div class="small-circle">
                    <img class="mh-100" src="/peserta/{{ $top_three_putri[2]->foto }}" alt="Gambar 2">
                </div>
            </div> -->
        </div>
        <div class="chartputra mt-5 text-center">
            <p style="font-size:20px">Grafik Voting</p>
            <b style="font-size:32px">Putera</b>
            <div class="wrapper">
                <canvas id="barChart"></canvas>
            </div>
        </div>
        <div class="chartputri mt-5 text-center">
            <p style="font-size:20px">Grafik Voting</p>
            <b style="font-size:32px">Puteri</b>
            <div class="wrapper">
                <canvas id="barChart2"></canvas>
            </div>
        </div>

        <div class="kotak">
            <p>Belum Memiliki Voucher?</p>
            <div class="gabung">
                <button type="button" class="buyy-button mt-1" data-bs-toggle="modal" data-bs-target="#modalll"
                    style="margin-left: 0px;">
                    Beli Sekarang
                </button>
                <!-- Modal -->
                <div class="modal modal-lg fade" id="modalll" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="width: 1971px !important; height: 472px;">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white" style="border-radius: 10px;">
                                <h1 class="modal-title fs-5">Beli Voucher</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body modalbeli"
                                style="display: flex; align-items: center; margin-left: -0px;">

                                <div class="voucher-info ml-3">
                                    <b>Cara Pembelian Voucher :</b>
                                    <ol>
                                        <li>Membeli voucher dengan nominal 10k, 20k, 50k dan 100k melalui Transfer
                                            Bank atau e-Wallet:
                                        </li>
                                        <ol type='a'>
                                            <li>Shopeepay - 081366882925 an Ni Luh Ajeng </li>
                                            <li>Sea Bank - 901081671424 an Ni Luh Ajeng </li>
                                        </ol>
                                        <li>
                                            Melakukan konfirmasi ke WA GenRe Sumsel (085156116914) dengan
                                            mengirimkan bukti pembayaran;

                                        </li>
                                        <li>Setelah melakukan konfirmasi kamu akan menerima kode voucher sesuai
                                            dengan nominal voucher yang telah dibeli.</li>
                                    </ol>
                                    <div class="tombol pl-1 d-flex g-2" style="margin-left:20px; gap: 20px;">
                                        <button
                                            style="background-color: transparent; border: 2px solid #FF7B3D; border-radius: 10px; color: #FF7B3D; padding: 10px;">10.000</button>
                                        <button
                                            style="background-color: transparent; border: 2px solid #84A6D0; border-radius: 10px; color: #84A6D0; padding: 10px;">20.000</button>
                                        <button
                                            style="background-color: transparent; border: 2px solid #418897; border-radius: 10px; color: #418897; padding: 10px;">50.000</button>
                                        <button
                                            style="background-color: transparent; border: 2px solid #FFDD2B; border-radius: 10px; color: #FFDD2B; padding: 10px;">100.000</button>
                                    </div>
                                    <p
                                        style="font-size: 10px; color: black; text-align: justify; margin-left: 20px; margin-top: 10px">
                                        Klik tombol di bawah ini untuk konfirmasi pembelian voucher (kirim bukti
                                        pembayaran).</p>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="https://wa.me/6285156116914" target="_blank"
                                    class="btn btn-primary">Konfirmasi</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h1 class="corinthia-text" style="color: #AA8D6B;">E-Voting</h1>
            <h2 class="poppins-text">Duta GenRe Sumatera Selatan 2023</h2>
        </div>

        <div class="row mt-5 cardpeserta" style="display: flex;margin-top: 20px;">
            <div class="col-lg-6" style=" width: 50%;">
                <div>
                    <div class="carousel-container">
                        <div class="carousel" id="carousel1">
                            @foreach ($putra as $item)
                            <div class="carousel-card border-0 shadow-card-vote p-3 mb-5 bg-white rounded">
                                <h1 style="
                                        margin-left: -146px;" class="text-left">
                                    Putera</h1>
                                <div class="d-flex justify-content-center">
                                    <div style="height: 370px; width: 250px;" class="border-0 shadow-card-vote rounded">
                                        <img class="img-fluid rounded" src="/peserta/{{ $item->foto }}" alt="Slide 1">
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center pt-4">
                                    <p>{{ $item->no_peserta }} - {{ $item->nama_peserta }}</p>
                                    <button type="button" class="btn btn-primary" id="vote-popup"
                                        data-no-peserta="{{ $item->no_peserta }}"
                                        data-nama-peserta="{{ $item->nama_peserta }}" data-id-peserta="{{ $item->id }}"
                                        data-foto-peserta="{{ $item->foto }}" data-bs-toggle="modal"
                                        data-bs-target="#myModal1">
                                        VOTE
                                    </button>
                                </div>
                                <a href="/putera" class="see-all">See All</a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Tambahkan card sesuai kebutuhan -->
                        <button id="prev-1" class="carousel-control left">
                            <img class="img" src="/images/kiri.png" alt="">
                        </button>
                        <button id="next-1" class="carousel-control right">
                            <img class="img" src="/images/kanan.png" alt="">
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5" style=" width: 50%">
                <div>
                    <div class="carousel-container">
                        <div class="carousel" id="carousel2">
                            @foreach ($putri as $item)
                            <div class="carousel-card border-0 shadow-card-vote p-3 mb-5 bg-white rounded">
                                <h1 style="
                                        margin-left: -146px;" class="text-left">
                                    Puteri</h1>
                                <div class="d-flex justify-content-center">
                                    <div style="height: 370px; width: 250px;" class="border-0 shadow-card-vote rounded">
                                        <img class="img-fluid rounded" src="/peserta/{{ $item->foto }}" alt="Slide 1">
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center pt-4">
                                    <p>{{ $item->no_peserta }} - {{ $item->nama_peserta }}</p>
                                    <button type="button" class="btn btn-primary" id="vote-popup"
                                        data-no-peserta="{{ $item->no_peserta }}"
                                        data-nama-peserta="{{ $item->nama_peserta }}" data-id-peserta="{{ $item->id }}"
                                        data-foto-peserta="{{ $item->foto }}" data-bs-toggle="modal"
                                        data-bs-target="#myModal1">
                                        VOTE
                                    </button>
                                </div>
                                <a href="/puteri" class="see-all">See All</a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Tambahkan card sesuai kebutuhan -->
                        <button id="prev-2" class="carousel-control left">
                            <img class="img" src="/images/kiri.png" alt="">
                        </button>
                        <button id="next-2" class="carousel-control right">
                            <img class="img" src="/images/kanan.png" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 971px; height: 472px;">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white" style="border-radius: 10px;">
                    <h1 class="modal-title fs-5">Participant Info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('voucher-use') }}" id="form-voucher" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body " style="display: flex; align-items: center;">
                        <div class="cardddd">
                            <img id="modalImage" src="" alt="Participant Image" width="205" height="307" style="border: none;  box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.25),
        0px 1px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;">
                        </div>
                        <div class="voucher-info ml-5" style="margin-left: 70px;">
                            <p style="text-align: left; margin-top: -120px !important; font-size: 26px; font-weight: bold;"
                                id="modalNoPeserta"></p>
                            <p style="text-align: left;  margin-top: -0px !important; font-size: 18px; "
                                id="modalNamaPeserta"></p>
                            <p style="text-align: left; margin-top: 0px;">Kode Voucher</p>
                            <input type="text" class="form-control" name="kode_voucher" id="voucherCode">
                            <input type="text" class="form-control" hidden name="id_peserta" id="modalIdPeserta"
                                value="">
                        </div>
                    </div>
                    <div class="bottom"
                        style="margin-top: -90px; display: flex; margin-left: 260px; gap: 20px; position: absolute;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary buttonbiru" id="myModalVoteInput">Vote</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="footer" id="votingfooter">
    <div class="konten" style="background-color: #3F3F3F; padding: 10px; flex: 1; width: 100%;">
        <div class="row">
            <!-- <div class="col-lg-3">
                <img src="{{ asset('images/logoduta.png') }}" style="width: 282px; height: 232px;" alt="">
            </div> -->
            <div class="col-lg-6 mt-4" style="color: white;">
                <b style="font-size: 32px;">Duta GenRe Sumatera Selatan</b>
                <div class="row">
                    <div class="col-lg-4">
                        <b style="font-size: 18px;">Sosial Media</b> <br>
                        <div class="iclass">
                            <i class="bi bi-instagram"></i> <a href="https://www.instagram.com/bkkbnofficial"
                                target="_blank">Bkkbn Official</a> <br>
                            <i class="bi bi-instagram"></i> <a href="https://www.instagram.com/bkkbnsumsel_official"
                                target="_blank">Bkkbn Sumsel</a> <br>
                            <i class="bi bi-instagram"></i> <a href="https://www.instagram.com/genre_sumsel"
                                target="_blank">GenRe Sumsel</a> <br>
                            <i class="bi bi-instagram"></i> <a href="https://www.instagram.com/dugen_sumsel"
                                target="_blank">Dugen Sumsel</a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <b style="font-size: 18px;">Narahubung</b>
                        <div class="iclass">
                            <i class="bi bi-whatsapp"></i> <a href="https://wa.me/6285269232867" target="_blank">+62
                                852
                                6923 2867</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="konten2" style="background-color: #191919; color: white; padding: 10px; width: 100%; margin-left: 0px;">
        <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project
            Palembang</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if (session('success'))
    < script>
        Swal.fire({
        title: "Berhasil Vote Senilai Rp. xxx untuk",
        text: $("#modalNoPeserta").text() + ' - ' + $("#modalNamaPeserta").text(),
        icon: "success",
        });
        </script>
        @endif

        @if (session('error'))
        <script>
        Swal.fire({
            icon: "error",
            title: "Voucher Kadaluarsa atau telah digunakan",
        });
        </script>
        @endif
        <script>
        $(document).ready(function() {
            const carousel1 = $("#carousel1");
            const carouselCards1 = carousel1.find(".carousel-card");
            const prevButton1 = $("#prev-1");
            const nextButton1 = $("#next-1");
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
        $(document).ready(function() {
            const carousel2 = $("#carousel2");
            const carouselCards2 = carousel2.find(".carousel-card");
            const prevButton2 = $("#prev-2");
            const nextButton2 = $("#next-2");
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

        document.querySelectorAll('#vote-popup').forEach(function(button) {
            button.addEventListener('click', function() {
                var noPeserta = this.getAttribute('data-no-peserta');
                var namaPeserta = this.getAttribute('data-nama-peserta');
                var idPeserta = this.getAttribute('data-id-peserta');
                var imageUrl = `/peserta/${this.getAttribute('data-foto-peserta')}`;

                // Mengisi data modal dengan informasi yang sesuai
                document.querySelector('#modalNoPeserta').textContent = noPeserta;
                document.querySelector('#modalNamaPeserta').textContent = namaPeserta;
                document.querySelector('#modalImage').setAttribute('src', imageUrl);
                document.querySelector('#modalIdPeserta').setAttribute('value', idPeserta);

                // Menampilkan modal
                var myModal = new bootstrap.Modal(document.getElementById('modal'));
                myModal.show();
            });
        });

        // Tambahkan event submit handler untuk form
        $("#form-voucher").submit(function(event) {
            var form = $(this)
            // Menghentikan aksi default form (pengiriman form)
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin Vote Peserta',
                text: $("#modalNoPeserta").text() + ' - ' + $("#modalNamaPeserta").text(),
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    console.log("Form submited");
                    // Jika dikonfirmasi, lanjutkan pengiriman form
                    form.submit();
                }
            });
        });


        // Mengambil elemen canvas untuk grafik pertama
        const canvas = document.getElementById("barChart");
            const ctx = canvas.getContext("2d");

            const dataPutra = {!! json_encode($point_putra) !!};
            const labelsPutra = {!! json_encode($label_putra) !!};

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
                        barThickness: 21, // Atur tinggi bar
                        maxBarThickness: 300, // Atur lebar bar
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
            const dataPutri = {!! json_encode($point_putri) !!};
            const labelsPutri = {!! json_encode($label_putri) !!};


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
                        barThickness: 21, // Atur tinggi bar
                        maxBarThickness: 300, // Atur lebar bar
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

            const mediaQuery = window.matchMedia("(max-width: 768px)");

const barThicknessDesktop = 30;
const maxBarThicknessDesktop = 300;
const categoryPercentageDesktop = 0.5;

const barThicknessMobile = 10;
const maxBarThicknessMobile = 100;
const categoryPercentageMobile = 0.8;

const chartHeight = 800;

if (mediaQuery.matches) {
    const mobileLabels = labelsPutra.slice(0, 13); 
    chart.config.data.labels = mobileLabels;
    chart.config.data.datasets[0].data = dataPutra.slice(0, 13); 
    chart.config.options.barThickness = barThicknessMobile;
    chart.config.options.maxBarThickness = maxBarThicknessMobile;
    chart.config.options.categoryPercentage = categoryPercentageMobile;
    chart.config.options.scales.y.ticks.fontSize = 4; 
    chart.config.options.scales.y.ticks.padding = 5;
    chart.config.options.scales.y.ticks.maxRotation = 45;
    chart.config.options.scales.y.ticks.minRotation = 0;
    chart.config.options.scales.y.ticks.autoSkip = false;

    chart.config.options.layout = {
        padding: {
            left: 0,
            right: 50,
        }
    };

    const canvas = document.getElementById('barChart');
    canvas.style.height = chartHeight + 'px';
    canvas.parentNode.style.overflowX = 'auto';
} else {
    chart.config.options.barThickness = barThicknessDesktop;
    chart.config.options.maxBarThickness = maxBarThicknessDesktop;
    chart.config.options.categoryPercentage = categoryPercentageDesktop;
    chart.config.data.labels = labelsPutra;

    const canvas = document.getElementById('barChart');
    canvas.style.height = chartHeight + 'px';
    canvas.parentNode.style.overflowX = 'auto';
}

if (mediaQuery.matches) {
    const mobileLabels2 = labelsPutri.slice(0, 15); 
    chart2.config.data.labels = mobileLabels2;
    chart2.config.data.datasets[0].data = dataPutri.slice(0, 15); 
    chart2.config.options.barThickness = barThicknessMobile;
    chart2.config.options.maxBarThickness = maxBarThicknessMobile;
    chart2.config.options.categoryPercentage = categoryPercentageMobile;
    chart2.config.options.scales.y.ticks.fontSize = 8;
    chart2.config.options.scales.x.ticks.fontSize = 18;
    chart2.config.options.scales.y.ticks.padding = 5; 
    chart2.config.options.scales.y.ticks.maxRotation = 45;
    chart2.config.options.scales.y.ticks.minRotation = 0;
    chart2.config.options.scales.y.ticks.autoSkip = false;

    chart2.config.options.layout = {
        padding: {
            left: 0,
            right: 50,
        }
    };

    const canvas2 = document.getElementById('barChart2');
    canvas2.style.height = chartHeight + 'px';
    canvas2.parentNode.style.overflowX = 'auto';
} else {
    chart2.config.options.barThickness = barThicknessDesktop;
    chart2.config.options.maxBarThickness = maxBarThicknessDesktop;
    chart2.config.options.categoryPercentage = categoryPercentageDesktop;
    chart2.config.data.labels = labelsPutri;

    const canvas2 = document.getElementById('barChart2');
    canvas2.style.height = chartHeight + 'px';
    canvas2.parentNode.style.overflowX = 'auto';
}

chart2.update();


chart.update();
        </script>
        @endsection