<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Genre</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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

</head>

<body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg sticky-top" data-bs-theme="dark" style="background-color: #191919;">
        <div class="container-fluid" style="background-color: #191919;">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/forum.png') }}" style="width: 47.21px;height: 51px;" alt="Logo 1">
                <img src="{{ asset('images/logoduta.png') }}" style="width: 62px;height: 58px;" alt="Logo 2">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02"
                style="font-family: 'Poppins',sans-serif; font-weight: 400;">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto gap-3">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="/tentang-kami" class="nav-link">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="sejarah-kami" class="nav-link">Sejarah</a>
                    </li>
                    <li class="nav-item">
                        <a href="/voting" class="btn btn-warning rounded-pill">Vote Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <!-- Footer -->

    </div>


    </script>
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
    @yield('script')

</body>

</html>