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
    <style>
    body {
        display: flex;
        flex-direction: column;
        /* min-height: 100vh; */
        margin: 0;
    }

    #navBar {
        /* Gaya navbar Anda */
    }

    .container {
        /* Gaya konten Anda */
        flex: 1;
    }

    .footer {
        /* Gaya footer Anda */
        margin-top: auto;
    }
</style>

</head>

<body>
    <!-- Navbar -->
    <div id="navBar">
    <nav class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('images/forum.png') }}" class="logo" alt="Logo 1">
            <img src="{{ asset('images/logoduta.png') }}" class="logo2" alt="Logo 2">
        </div>
        <div class="navbar-right">
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><a href="/tentang-kami">Tentang</a></li>
                <li><a href="sejarah-kami">Sejarah</a></li>
                <li><a href="/voting" class="vote-button">Vote Sekarang</a></li>
            </ul>
        </div>
    </nav>
</div>
    @yield('content')
    <!-- Footer -->
   
    </div>


    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
 <script>
    window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    var navbar = document.getElementById("navBar");
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        navbar.classList.add("navbar-fixed");
    } else {
        navbar.classList.remove("navbar-fixed");
    }
}

 </script>
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
