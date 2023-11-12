@extends('fLayout')

@section('content')
<div id="landingpage">
    <div class="hero">
        <img src="images/grandfinal.png" alt="21" class="fluid" />
        <div class="title">
            <h1 class="corinthia-text">Pemilihan</h1>
            <h2 class="poppins-text">Duta GenRe Sumatera Selatan 2023</h2>
            <a href="/voting" class="votenow-button">Vote</a>
            <button type="button" class="buyy-button" data-bs-toggle="modal" data-bs-target="#modal" style=" background-color: transparent;border: 2px solid #ffd600;padding: 8px;border-radius: 16px;width: 134px;height:42px;cursor: pointer;font-family: Poppins; font-weight: 700; text-decoration: none; color: #ffd600; margin-top: 30px; margin-left: 30px;">
                Beli Voucher
            </button>

        </div>
    </div>
    <div class="tentang">
        <div class="row">
            <div class="col-lg-6">
                <img src="images/logoduta.png" alt="21" class="logo" />
            </div>
            <div class="col-lg-5 penjelasan">
                <b>Tentang Duta GenRe Sumsel</b>
                <p>Ikatan Duta Mahasiswa Generasi Berecana (GenRe) Sumatera Selatan adalah organisasi beranggotakan Duta
                    Mahasiswa GenRe provinsi Sumatera Selatan yang merupakan suatu wujud loyalitas untuk
                    mensosialisasikan dan melaksanakan advokasi terkait program Generasi Berencana ke seluruh remaja di
                    Provinsi Sumatera Selatan. <br><br>

                    DMSS didirikan pada tanggal 14 Februari 2016 yang merupakan hasil dari Forum Tukar Pengalaman
                    Program GenRe bagi Duta Mahasiswa Genre Sumatera Selatan dari angkatan 2011-2015 di Palembang untuk
                    jangka waktu yang tidak ditentukan.</p>

                <b>Tugas Duta GenRe Sumsel</b>
                <ul>
                    <li>Melakukan sosialisasi program-program GenRe di kalangan remaja dan mahasiswa serta meningkatkan
                        pengetahuan, sikap, dan perilaku remaja dan mahasiswa untuk berperilaku sehat dan berakhlak
                        mulia.</li>
                    <li>Mempromosikan program GenRe dengan menjadi figure motivator dari kalangan remaja dan mahasiswa,
                        sesuai dengan prinsip dari, oleh dan untuk remaja dan mahasiswa.</li>
                    <li>Menumbuhkan, mengembangkan, dan mengelola PIK R/M yang ada sebagai wadah atau tempat
                        berlangsungnya konseling ataupun kegiatan-kegiatan GenRe melalui pendekatan ramah remaja atau
                        mahasiswa.</li>
                    <li>Menjadi tempat konseling teman sebaya atau remaja agar dapat memberikan solusi bagi permasalahan
                        remaja yang ada dengan memasukkan nilai-nilai GenRe di dalamnya.</li>
                    <li>Menjadi role model yang memiliki masa depan terencana bagi remaja masa kini agar memiliki
                        kualitas hidup yang tinggi. Menjadi remaja dan mahasiswa yang berperilaku sehat dan berakhlak
                        mulia.</li>
                </ul>
                <a href="/tentang-kami" class="more-button">Selengkapnya</a>
            </div>
        </div>
        <div class="kegiatan">
            <img src="images/kegiatan.png" alt="21" class="kegiatan" />
        </div>
        <div class="dukungan">
            <div class="kotak">
                <p>Berikan Dukungan Kepada Peserta Pemilihan Duta GenRe Sumatera Selatan 2023</p>
                <div class="gabung">
                    <a href="/voting" class="votenoww-button">Vote</a>

                    <button type="button" class="buyy-button" data-bs-toggle="modal" data-bs-target="#modal">
                        Beli Voucher
                    </button>
                    <!-- Modal -->
                    <div class="modal modal-lg fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="width: 1971px !important; height: 472px;">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white" style="border-radius: 10px;">
                                    <h1 class="modal-title fs-5">Beli Voucher</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="display: flex; align-items: center;">
                                    <div class="cardddd">
                                        <img src="images/qris.png" alt="Participant Image" width="105" height="287">
                                    </div>
                                    <div class="voucher-info ml-3">
                                        <b>Cara Pembelian Voucher :</b>
                                        <ol style="text-align: justify;">
                                            <li>Membeli voucher dengan nominal 10k, 20k, 50k dan 100k melalui scan QRIS
                                                di samping atau dapat melalui: </li>
                                            <ol type='a'>
                                                <li>OVO - 081271701998 a.n Cindy Octavina </li>
                                                <li>Gopay - 081271701998 a.n Cindy Octavina </li>
                                                <li>Shopeepay - 081271701998 a.n Cindy Octavina;</li>
                                            </ol>
                                            <li>
                                                Melakukan konfirmasi ke WA GenRe Sumsel (081271701998) dengan
                                                mengirimkan bukti pembayaran;
                                            </li>
                                            <li>Setelah melakukan konfirmasi kamu akan menerima kode voucher sesuai
                                                dengan nominal voucher yang telah dibeli.</li>
                                        </ol>
                                        <div class="tombol pl-1 d-flex g-2" style="margin-left:20px; gap: 20px;">
                                            <button style="background-color: transparent; border: 2px solid #FF7B3D; border-radius: 10px; color: #FF7B3D; padding: 10px;">10.000</button>
                                            <button style="background-color: transparent; border: 2px solid #84A6D0; border-radius: 10px; color: #84A6D0; padding: 10px;">20.000</button>
                                            <button style="background-color: transparent; border: 2px solid #418897; border-radius: 10px; color: #418897; padding: 10px;">50.000</button>
                                            <button style="background-color: transparent; border: 2px solid #FFDD2B; border-radius: 10px; color: #FFDD2B; padding: 10px;">100.000</button>
                                        </div>
                                        <p style="font-size: 10px; color: black; text-align: justify; margin-left: 20px; margin-top: 10px">
                                            Klik tombol di bawah ini untuk konfirmasi pembelian voucher (kirim bukti
                                            pembayaran).</p>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Konfirmasi">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="sejarah">
            <h1 class="corinthia-text">Sejarah</h1>
            <h2 class="poppins-text">Duta GenRe Sumatera Selatan</h2>
            <br>
            <p>Program Genre (Generasi berencana) diinisiasi pada tahun 2007 oleh Bapak Dr. Sudibyo Alimoeso yang saat
                itu menjabat sebagai Deputi KSPK BKKBN. Program ini dilatarbelakangi oleh banyaknya kenakalan remaja
                yang terjadi. Seperti seksualitas, penyalahgunaan narkoba, seks bebas dan nikah muda. <br><br>

                Fenomena kenakalan remaja yang terjadi diiringi dengan jumlah remaja yang hampir 30% dari penduduk
                Indonesia. Hal ini tentunya menjadi fokus Badan Kependudukan dan Keluarga Berencana Nasional karena
                terkait dengan kependudukan. Terlebih, remaja yang merupakan generasi penerus bangsa, perlu dipersiapkan
                menjadi manusia yang sehat secara jasmani, rohani, mental dan spiritual. <br><br>

                Oleh karena itu diperlukan suatu program yang dapat memberikan informasi yang berkaiatan dengan
                penyiapan diri remaja menyongsong kehidupan berkeluarga yang lebih baik, menyiapakan pribadi yang matang
                dalam membangun keluarga yang harmonis, dan memantapkan perencanaan dalam menata kehidupan untuk
                keharmonisan keluarga. Sebagai Implementasi Undang-Undang Nomor 52 tahun 2009, tentang perkembangan
                kependudukan dan pembangunan keluarga, pasal 48 ayat 1 (b) yang mengatakan bahwa “peningkatan kualitas
                remaja dengan dengan pemberian akases informasi, pendidikan, konseling, dan pelayanan tentang kehidupan
                berkeluarga,” maka BKKBN sebagai salah satu istitusi pemerintah harus mewujudkan tercapainya peningkatan
                kualitas remaja melalui program Generasi Berencana. <br><br>

                Melalui program GenRe, BKKBN membuat Pusat Informasi Konseling Remaja dan Mahasiswa (PIK R/M) dan
                bekerja sama dengan para mahasiswa dengan mengadakan Pemilihan Duta Mahasiswa GenRe. <br><br>

                BKKBN Perwakilan Sumatera Selatan selaku pendukung jalannya program BKKBN pusat juga melaksanakan semua
                program kerja termasuk mengadakan Pemilihan Duta Mahasiswa GenRe di wilayah provinsi Sumatera Selatan.
            </p>
            <a href="sejarah-kami" class="more-button">Selengkapnya</a>
        </div>
        <div class="timelinee">
            <h3 class="corinthia-text">Dari Masa ke Masa</h3>
            <h4 class="poppins-text">Duta GenRe Sumatera Selatan</h4>
            <br><br>
            <section class="timeline">
                <ul>
                    <li>
                        <div>
                            <time>2011</time> <!-- Tahun disini -->
                            <img src="images/2011.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2012</time> <!-- Tahun disini -->
                            <img src="images/2012.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2013</time> <!-- Tahun disini -->
                            <img src="images/2013.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2014</time> <!-- Tahun disini -->
                            <img src="images/2014.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2015</time> <!-- Tahun disini -->
                            <img src="images/2015.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2016</time> <!-- Tahun disini -->
                            <img src="images/2016.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2017</time> <!-- Tahun disini -->
                            <img src="images/2017.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2018</time> <!-- Tahun disini -->
                            <img src="images/2018.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2019</time> <!-- Tahun disini -->
                            <img src="images/2019.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>
                    <li>
                        <div>
                            <time>2020</time> <!-- Tahun disini -->
                            <img src="images/2020.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>

                    <li>
                        <div>
                            <time>2022</time> <!-- Tahun disini -->
                            <img src="images/2022.png" alt="Gambar Anda" style="width: 485px; height: 274px; margin-left: -10px;">
                            <!-- Gambar disini -->
                        </div>
                    </li>

                </ul>
            </section>
        </div>
    </div>
</div>
<div class="footer" id="landingfooter">
        <div class="konten" style="background-color: #3F3F3F; padding: 10px; flex: 1; width: 100%; margin-top: 9000px;">
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
@endsection
@section('script')
<script>
    (function() {
        "use strict";

        // define variables
        var items = document.querySelectorAll(".timeline li");

        // check if an element is in viewport
        // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function callbackFunc() {
            for (var i = 0; i < items.length; i++) {
                if (isElementInViewport(items[i])) {
                    items[i].classList.add("in-view");
                }
            }
        }

        // listen for events
        window.addEventListener("load", callbackFunc);
        window.addEventListener("resize", callbackFunc);
        window.addEventListener("scroll", callbackFunc);
    })();
</script>
@endsection