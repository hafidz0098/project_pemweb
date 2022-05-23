<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tanjung Bira</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/frontend/assets/img/favicon.png" rel="icon">
  <link href="/frontend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/frontend/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/frontend/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="/"><span>Tanjung Bira</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Cara Pemesanan</a></li>
          <li><a class="nav-link scrollto" href="/blog">Blog</a></li>
          <li><a class="nav-link scrollto" href="/pesan">Pesan Sekarang</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Pantai Tanjung Bira</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('sweetalert::alert')

  <!-- Vendor JS Files -->
  <script src="/frontend/assets/vendor/purecounter/purecounter.js"></script>
  <script src="/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/frontend/assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="/frontend/assets/js/main.js"></script>

</body>

</html>