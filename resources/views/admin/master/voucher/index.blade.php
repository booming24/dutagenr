@include('layouts.navbar')
<button type="button" class="btn btn-primary mb-2 mt-4" style="width: 120px; margin-left: 320px;" data-bs-toggle="modal"
    data-bs-target="#modal">
    <i class="bi bi-plus"></i> Voucher
</button>
<!-- Modal -->
<div class="modal modal-lg fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white"
                style="border-radius: 10px; background-color: #418897 !important;">
                <h5 class="modal-title">Tambah Voucher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulir di sini -->
                <form action="{{ route('voucher-store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="nominal" class="form-label">Nominal</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="nominal" id="tanpa-rupiah" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="periode" class="form-label">Periode</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="periode" id="periode">
                                <option value="SEMIFINAL">Semifinal</option>
                                <option value="FINAL">Final</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="jumlah_voucher" class="form-label">Jumlah Voucher</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="jumlah_voucher" id="jumlah_voucher" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<table border="1" class="table" id="myTable">
    <thead style="background-color: #418897 !important;">
        <tr>
            <th>Kode Voucher</th>
            <th>Nominal</th>
            <th>Periode</th>
            <th>Tanggal Buat</th>
            <th>Tanggal Dipakai</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($voucher as $item)
            <tr>
                <td>{{ $item->kode_voucher }}</td>
                <td>{{ number_format($item->nominal, 0, ',', '.') }}</td>
                <td>{{ $item->periode }}</td>
                <td>{{ $item->created_at_wib }}</td>
                <td>{{ $item->updated_at_wib }}</td>
                <td>
                    @if ($item->is_used == 1)
                        <h5 style="color: red">Terpakai</h5>
                    @else
                        <h5 style="color: green">Belum dipakai</h5>
                    @endif
                </td>
                <td><a href="{{ route('voucher-delete', $item->id) }}" onclick="return confirm('Yakin hapus data ini?')"
                        class="btn btn-sm btn-danger">HAPUS</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="Footer" style="display: flex; flex-direction: column; width: 100%; margin-top: 290px;">
    <div class="konten2" style="background-color: #418897; color: white; padding: 10px; width: 100%; margin-left: 0px;">
        <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project Palembang
        </p>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });
</script>
