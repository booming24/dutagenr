    @include('layouts.navbar')
    <table border="1" class="table" style="margin-left: 0px; margin-top: 20px; width: 1000px;" id="myTable">
        <thead style="background-color: #418897 !important;">
            <tr>
                <th>NO</th>
                <th>NAMA PESERTA</th>
                <th>POINT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peserta as $item)
                <tr>
                    <td>{{ $item->no_peserta }}</td>
                    <td>{{ $item->nama_peserta }}</td>
                    <td>{{ $item->point_final }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="Footer" style="display: flex; flex-direction: column; width: 100%; margin-top: 190px;">
        <div class="konten2"
            style="background-color: #418897; color: white; padding: 10px; width: 100%; margin-left: 0px;">
            <p style="margin-top: auto; text-align: center;">Hak Cipta © 2023 Alpha E-Voting by Alpha Project Palembang
            </p>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
