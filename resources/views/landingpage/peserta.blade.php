@extends('fLayout')

@section('content')
    <div id="peserta">
        <div class="text-center">
            <h1 class="corinthia-text mt-4" style="color: #AA8D6B;">E-Voting</h1>
            <h2 class="poppins-text">Duta GenRe Sumatera Selatan 2023</h2>
            <div class="row mb-4">
                <div class="col">
                    <a href="/voting" class="btn btn-outline-primary"
                        style="border-radius: 16px;border: 2px solid;width: 200px;height:42px;cursor: pointer;font-family: Poppins; font-weight: 700; margin-top: 30px;">Statistik
                        Vote</a>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#modalll" class="btn btn-outline-primary"
                        style="border-radius: 16px;border: 2px solid;width: 200px;height:42px;cursor: pointer;font-family: Poppins; font-weight: 700; margin-top: 30px;">Beli
                        Voucher</a>
                </div>
                <!-- Modal -->

            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-beetwen">
                    @foreach ($data as $item)
                        <div class="col-lg-4 d-flex flex-column align-items-center pb-5">
                            <div class="card"
                                style="box-shadow: 3px 0px 6px 0px #00000040;
                             width: 20rem;">
                                <div style="padding: 10%">
                                    <img src="/peserta/{{ $item->foto }}"
                                        style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);

                                box-shadow: 4px 0px 4px 0px rgba(0, 0, 0, 0.25);
                                "
                                        class="card-img-top">
                                </div>
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title">{{ $item->no_peserta }}</h5>
                                    <h5 class="card-title">{{ $item->nama_peserta }}</h5>
                                    <h5 class="card-title"> Persentase Voting : {{ $item->percentage }} %</h5>
                                    <button type="button" class="btn btn-primary" id="vote-popup"
                                        data-no-peserta="{{ $item->no_peserta }}"
                                        data-nama-peserta="{{ $item->nama_peserta }}" data-id-peserta="{{ $item->id }}"
                                        data-foto-peserta="{{ $item->foto }}" data-bs-toggle="modal"
                                        data-bs-target="#myModal1">
                                        VOTE
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            {{ $now }}
            {{ $expiredTime }}
            @if ($now > $expiredTime)
                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="border-radius: 10px; background-color: #ff4848 !important;">
                                <h1>Vote ditutup</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Terima kasih telah berpasrtisipasi di Pemilihan Semifinal Duta GenRe 2023</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="width: 971px; height: 472px;">
                        <div class="modal-content ">
                            <div class="modal-header bg-dark text-white" style="border-radius: 10px;">
                                <h1 class="modal-title fs-5">Vote Peserta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('voucher-use') }}" id="form-voucher" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-lg-12">
                                        <div class="row d-flex justify-content-beetwen">
                                            <div class="col-lg-6 ">
                                                <img id="modalImage" src="" alt="Participant Image"
                                                    style="width: 215px !important; border: none;  box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.25), 0px 1px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;">
                                            </div>
                                            <div class="col-lg-6 isivote">
                                                <h5 id="modalNoPeserta"></h5>
                                                <h5 style="font-weight: normal;" id="modalNamaPeserta"></h5>
                                                <h3 style="font-weight: normal; font-size: 18px;">Kode Voucher</h3>
                                                <input type="text" class="form-control" name="kode_voucher"
                                                    id="voucherCodee">
                                                <input type="text" class="form-control" hidden name="id_peserta"
                                                    id="modalIdPeserta" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom"
                                    style="margin-top: -18px; display: flex; margin-left: 180px; gap: 20px; position: absolute;">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" id="myModalVoteInput">Vote</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
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
                            <div class="modal-body" style="display: flex; align-items: center; margin-left: -0px;">

                                <div class="voucher-info" style="text-align: justify;">
                                    <b>Cara Pembelian Voucher :</b>
                                    <ol>
                                        <li>Membeli voucher dengan nominal 10k, 20k, 50k dan 100k melalui Transfer
                                            Bank atau e-Wallet:
                                        </li>
                                        <ol type='a'>
                                            <li>BCA 8530363458 an Peby Marensia </li>

                                        </ol>
                                        <li>
                                            Melakukan konfirmasi ke WA GenRe Sumsel (082268775852) dengan mengirimkan bukti
                                            pembayaran;

                                        </li>
                                        <li>Setelah melakukan konfirmasi kamu akan menerima kode voucher sesuai dengan
                                            nominal voucher yang telah dibeli.</li>
                                    </ol>
                                    <div class="tombol pl-1 d-flex g-2" style="gap: 1px;">
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
                                <a href="https://wa.me/6282268775852" target="_blank"
                                    class="btn btn-primary">Konfirmasi</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" id="pesertafooter">
        <div class="konten" style="background-color: #3F3F3F; padding: 10px; flex: 1; width: 100%;">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ asset('images/logoduta.webp') }}" style="width: 282px; height: 232px;" alt="">
                </div>
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
        <div class="konten2"
            style="background-color: #191919; color: white; padding: 10px; width: 100%; margin-left: 0px;">
            <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project
                Palembang</p>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
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
        </script>
    @endsection
