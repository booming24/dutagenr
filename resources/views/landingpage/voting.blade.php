@extends('fLayout')

@section('content')
    <div id="voting">
        <div class="statistik">
            <h1 class="corinthia-text">Statistik</h1>
            <p>e-Voting Duta GenRe Sumatera Selatan 2023</p>
        </div>
        <div class="container">
            <div>
                <div class="circles">
                    <div class="circle">
                        <img class="mh-100" src="/peserta/{{ $top_three_putra[0]->foto }}" alt="Gambar 1">
                    </div>
                    <div class="circle">
                        <img class="mh-100" src="/peserta/{{ $top_three_putri[0]->foto }}" alt="Gambar 2">
                    </div>
                </div>
                <div class="small-circles mt-4">
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
                </div>
            </div>
            <div>
                <p>Grafik Voting</p>
                <b>Putera</b>
                <div class="wrapper">
                    <canvas id="barChart" width="200" height="90"></canvas>
                </div>
            </div>
            <div>
                <p>Grafik Voting</p>
                <b>Puteri</b>
                <div class="wrapper">
                    <canvas id="barChart2" width="200" height="90"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <div class="carousel-container">
                            <div class="carousel" id="carousel1">
                                @foreach ($putra as $item)
                                    <div class="carousel-card border-0 shadow-card-vote p-3 mb-5 bg-white rounded">
                                        <h1
                                            style="
                                        margin-left: -146px;"class="text-left">
                                            Putera</h1>
                                        <div class="d-flex justify-content-center">
                                            <div style="height: 370px; width: 250px;"
                                                class="border-0 shadow-card-vote rounded">
                                                <img class="img-fluid rounded" src="/peserta/{{ $item->foto }}"
                                                    alt="Slide 1">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center pt-4">
                                            <p>{{ $item->no_peserta }} - {{ $item->nama_peserta }}</p>
                                            <button type="button" class="btn btn-primary" id="vote-popup"
                                                data-no-peserta="{{ $item->no_peserta }}"
                                                data-nama-peserta="{{ $item->nama_peserta }}"
                                                data-id-peserta="{{ $item->id }}"
                                                data-foto-peserta="{{ $item->foto }}" data-bs-toggle="modal"
                                                data-bs-target="#myModal1">
                                                VOTE
                                            </button>
                                        </div>
                                        <a href="/all-peserta" class="see-all">See All</a>
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
                <div class="col-lg-6">
                    <div>
                        <div class="carousel-container">
                            <div class="carousel" id="carousel2">
                                @foreach ($putri as $item)
                                    <div class="carousel-card border-0 shadow-card-vote p-3 mb-5 bg-white rounded">
                                        <h1
                                            style="
                                        margin-left: -146px;"class="text-left">
                                            Puteri</h1>
                                        <div class="d-flex justify-content-center">
                                            <div style="height: 370px; width: 250px;"
                                                class="border-0 shadow-card-vote rounded">
                                                <img class="img-fluid rounded" src="/peserta/{{ $item->foto }}"
                                                    alt="Slide 1">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center pt-4">
                                            <p>{{ $item->no_peserta }} - {{ $item->nama_peserta }}</p>
                                            <button type="button" class="btn btn-primary" id="vote-popup"
                                                data-no-peserta="{{ $item->no_peserta }}"
                                                data-nama-peserta="{{ $item->nama_peserta }}"
                                                data-id-peserta="{{ $item->id }}"
                                                data-foto-peserta="{{ $item->foto }}" data-bs-toggle="modal"
                                                data-bs-target="#myModal1">
                                                VOTE
                                            </button>
                                        </div>
                                        <a href="/all-peserta" class="see-all">See All</a>
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
                    <form action="{{ route('voucher-use') }}" id="form-voucher" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        <div class="modal-body" style="display: flex; align-items: center;">
                            <div class="cardddd">
                                <img id="modalImage" src="" alt="Participant Image" width="205"
                                    height="307"
                                    style="border: none;  box-shadow: 0px 9px 10px 0px rgba(0, 0, 0, 0.25),
        9px 0px 10px 0px rgba(0, 0, 0, 0.25);">
                            </div>
                            <div class="voucher-info ml-5" style="margin-left: 50px;">
                                <p style="text-align: left;" id="modalNoPeserta"></p>
                                <p style="text-align: left;" id="modalNamaPeserta"></p>
                                <p style="text-align: left;">Kode Voucher</p>
                                <input type="text" class="form-control" name="kode_voucher" id="voucherCode">
                                <input type="text" class="form-control" hidden name="id_peserta" id="modalIdPeserta"
                                    value="">
                            </div>
                        </div>
                        <div class="bottom" style="margin-top: -0px; display: flex; margin-left: 250px; gap: 20px;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="myModalVoteInput">Vote</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" id="votingfooter">
        <div class="konten" style="background-color: #3F3F3F; padding: 10px; flex: 1; width: 100%;">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ asset('images/logoduta.png') }}" style="width: 282px; height: 232px;" alt="">
                </div>
                <div class="col-lg-6" style="color: white;">
                    <b style="font-size: 32px;">Duta GenRe Sumatera Selatan</b>
                    <div class="row">
                        <div class="col-lg-4">
                            <b style="font-size: 18px;">Sosial Media</b> <br>
                            <div class="iclass">
                                <i class="bi bi-instagram"></i> Bkkbn Official <br>
                                <i class="bi bi-instagram"></i> Bkkbn Sumsel <br>
                                <i class="bi bi-instagram"></i> GenRe Sumsel <br>
                                <i class="bi bi-instagram"></i> Dugen Sumsel
                            </div>

                        </div>
                        <div class="col-lg-5">
                            <b style="font-size: 18px;">Narahubung</b>
                            <div class="iclass">
                                <i class="bi bi-whatsapp"></i> +62 852 6923 2867
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="konten2"
            style="background-color: #191919; color: white; padding: 10px; width: 100%; margin-left: 0px;">
            <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project
                Palembang</p>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success"
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: '<a href="#">Why do I have this issue?</a>'
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
    @endsection
