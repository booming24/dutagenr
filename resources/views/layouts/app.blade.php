<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Genre</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Corinthia:700|Poppins:300&display=swap|Poppins:600&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Poppins:wght@300;600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Poppins:wght@300;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('../assets/dataTables/datatables.min.css') }}">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 70%;
            background-color: white;
            color: white;
            position: fixed;
            margin-top: 700px;
            margin-left: 40px;
            border-radius: 20px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar .logo {
            width: 100%;
            text-align: center;
            padding: 20px 0;
        }

        .sidebar .logo img {
            width: 100px;
            /* margin-top: 100px; */
        }

        .sidebar .menu {
            padding: 20px 0;
            text-align: center;
        }

        .sidebar .menu h4 {
            margin: 0;
        }

        .menu a {
            color: black;
            text-decoration: none;
        }

        .menu a:hover {
            color: orange;
        }

        .menu {
            float: left;
            margin-left: -100px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logoduta.png') }}" alt="Logo">
        </div>
        <div class="menu">
            @if (auth()->user()->level == 'adminalpha')
                <ul>
                    <li style="color: black">Home</li>
                    <ul>
                        <li><a href="#" style="margin-left: 40px;">Dashboard</a></li>
                    </ul>
                </ul>
                <ul>
                    <li style="color: black">Master</li>
                    <ul>
                        <li><a href="{{ route('peserta') }}" style="margin-left: 80px;">Master Peserta</a></li>
                        <li><a href="{{ route('voucher') }}" style="margin-left: 78px;">Master Voucher</a></li>
                    </ul>
                </ul>
                <ul>
                    <li style="color: black">Laporan</li>
                    <ul>
                        <li><a href="{{ route('laporan-penjualan') }}" style="margin-left: 89px;">Laporan Penjualan</a>
                        </li>
                        <li><a href="{{ route('laporan-penjualan') }}" style="margin-left: 82px;">Laporan Peserta </a>
                        </li>
                    </ul>
                </ul>

                <ul>
                    <li><a href="{{ route('user') }}" style="margin-left: -20px;">Akun</a></li>
                    <ul>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger"
                                    style="margin-left: 70px; margin-top: 20px;">Logout</button>
                            </form>
                        </li>
                    </ul>
                </ul>
            @elseif (auth()->user()->level == 'admingenre')
                <ul>
                    <li><a href="/">Home</a></li>
                    <ul>
                        <li><a href="#" style="margin-left: 40px;">Dashboard</a></li>
                    </ul>
                </ul>
                <ul>
                    <li><a href="#">Laporan</a></li>
                    <ul>
                        <li><a href="{{ route('laporan-penjualan') }}" style="margin-left: 89px;">Laporan Penjualan</a>
                        </li>
                        <li><a href="{{ route('laporan-penjualan') }}" style="margin-left: 82px;">Laporan Peserta </a>
                        </li>
                    </ul>
                </ul>
                <ul>
                    <li><a href="#" style="margin-left: -20px;">Akun</a></li>
                    <ul>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger"
                                    style="margin-left: 70px; margin-top: 20px;">Logout</button>
                            </form>
                        </li>
                    </ul>
                </ul>
            @endif
        </div>
    </div>
    @yield('content')
    <!-- Footer -->
    <div id="Footer">

    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- boostrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('../assets/dataTables/datatables.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script>
        let table = new DataTable('#datatables');
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
