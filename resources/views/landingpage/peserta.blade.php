@extends('fLayout')

@section('content')
    <div id="peserta">
        <div class="text-center">
            <h1 class="corinthia-text" style="color: #AA8D6B;">E-Voting</h1>
            <h2 class="poppins-text">Duta GenRe Sumatera Selatan 2023</h2>
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
                                    <h5 class="card-title"> Point : {{ $item->point_semifinal }}</h5>
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
                            <div class="modal-body">
                                <div class="col-lg-12">
                                    <div class="row d-flex justify-content-beetwen">
                                        <div class="col-lg-6">
                                            <img id="modalImage" src="" alt="Participant Image"
                                                style="width: 215px !important; border: none;  box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.25),
            0px 1px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;">
                                        </div>
                                        <div class="col-lg-6 pt-4">
                                            <h5 id="modalNoPeserta"></h5>
                                            <h5 id="modalNamaPeserta"></h5>
                                            <h3>Kode Voucher</h3>
                                            <input type="text" class="form-control" name="kode_voucher" id="voucherCode">
                                            <input type="text" class="form-control" hidden name="id_peserta"
                                                id="modalIdPeserta" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom"
                                style="margin-top: -90px; display: flex; margin-left: 260px; gap: 20px; position: absolute;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" id="myModalVoteInput">Vote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
