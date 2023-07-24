<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Website Desa Penusupan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('user/img/favicon_tegal.png') }}" rel="icon">
    <link href="{{ asset('user/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="{{ asset('user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <a href="/" class="logo me-auto"><img src="{{ asset('user/img/penusupan.png') }}" alt=""></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/profil">Profil Desa</a></li>
                    <li><a href="/keluhan">Keluhan</a></li>
                    <li class="dropdown"><a href="#"><span>Data Desa</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/data-penduduk"><span>Data Penduduk</span></a>
                            </li>
                            <li><a href="/data-kematian">Data Kematian</a></li>
                        </ul>
                    </li>
                    <li><a href="/posts">Berita</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            <a href="/log-in" class="get-started-btn scrollto">Login</a>
        </div>
    </header>

    <!-- ======= Content ======= -->
    @yield('content')

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Penusupan</h3>
                        <p>
                            Jl. Pener, Kluwih, Penusupan, <br>
                            Kec. Pangkah, Kabupaten Tegal<br>
                            Jawa Tengah 52471 <br><br>
                            <strong>Phone:</strong> 0000<br>
                            <strong>Email:</strong> xxxxxx<br>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Desa Penusupan</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by Dias Akhdan Sistem Informasi IT Telkom Purwokerto</a>
                </div>
            </div>
            <div class="social-links text-center text-md-end pt-3 pt-md-0">
                <a href="https://www.instagram.com/d.akhdannn_/" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS -->
    <script src={{ asset('user/vendor/purecounter/purecounter.js') }}></script>
    <script src={{ asset('user/vendor/aos/aos.js') }}></script>
    <script src={{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('user/vendor/glightbox/js/glightbox.min.js') }}></script>
    <script src={{ asset('user/vendor/isotope-layout/isotope.pkgd.min.js') }}></script>
    <script src={{ asset('user/vendor/swiper/swiper-bundle.min.js') }}></script>
    <script src={{ asset('user/vendor/php-email-form/validate.js') }}></script>

    <!--Main JS-->
    <script src={{ asset('user/js/main.js') }}></script>

    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>

</html>
