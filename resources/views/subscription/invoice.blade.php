
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pembayaran</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ url('/assets/') }}/img/favicon.png" rel="icon">
  <link href="{{ url('/assets/') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('/assets/') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('/assets/') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ url('/assets/') }}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ url('/assets/') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ url('/assets/') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ url('/assets/') }}/css/main.css" rel="stylesheet">

</head>

<body class="index-page" style="background-color: #fafafa">

  <header id="header" class="header d-flex align-items-center sticky-top" style="background-color: #fafafa">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="{{url('')}}" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="{{url('assets')}}/img/logo-text-right.png" alt="">
        <h1 class="sitename"></h1>
      </a>

      <nav id="navmenu" class="navmenu" style="display: none">
        <ul>
          <li><a href="#hero" class="active">Beranda<br></a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Layanan</a></li>
          <li><a href="#team">Tim</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      {{-- <a class="btn-getstarted" href="{{url('register')}}">Daftar Sekarang</a> --}}

    </div>
  </header>

  <main class="main">
    <div class="container p-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>


  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
{{-- <h2>Invoice</h2>
<p>Order ID: {{ $transaction->order_id }}</p>
<p>Harga: Rp{{ number_format($transaction->amount, 0, ',', '.') }}</p>
<p>Bank: {{ strtoupper($midtrans->va_numbers[0]->bank) }}</p>
<p>Virtual Account: {{ $midtrans->va_numbers[0]->va_number }}</p> --}}
