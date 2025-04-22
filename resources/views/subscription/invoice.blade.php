<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pembayaran</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ url('assets') }}/img/favicon.png" rel="icon">
  <link href="{{ url('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ url('assets') }}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ url('assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ url('assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ url('assets') }}/css/main.css" rel="stylesheet">

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


    </div>
  </header>

  <main class="main">
    <div class="container p-3">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="text-center">Pilih Metode Pembayaran</h5>
              <hr>
              <div class="row justify-content-center">
                <div class="col-xl-4 col-xxl-4 col-sm-6 mb-3">
                  <form action="{{route('subscription.create')}}" method="post" class="w-100">
                    @csrf
                    <input type="hidden" name="bank" value="bri">
                    <input type="hidden" name="id_package" value="{{$plan->id}}">
                    <input type="hidden" name="order_id" value="{{$orderId}}">
                    <button type="submit" class="p-0 border-0 bg-transparent w-100">
                        <div class="card p-2 text-center">
                            <img src="{{ url('assets-admin') }}/images/bank/BRI.webp" alt="BRI" class="img-fluid" style="max-height: 100px; object-fit: contain;">
                        </div>
                    </button>
                </form>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6 mb-3">
                <form action="{{route('subscription.create')}}" method="post" class="w-100">
                  @csrf
                  <input type="hidden" name="bank" value="gopay">
                    <input type="hidden" name="id_package" value="{{$plan->id}}">
                    <input type="hidden" name="order_id" value="{{$orderId}}">
                  <button type="submit" class="p-0 border-0 bg-transparent w-100">
                      <div class="card p-2 text-center">
                          <img src="{{ url('assets-admin') }}/images/bank/gopay.png" alt="GOPAY" class="img-fluid" style="max-height: 100px; object-fit: contain;">
                      </div>
                  </button>
              </form>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6 mb-3">
                <form action="{{route('subscription.create')}}" method="post" class="w-100">
                  @csrf
                  <input type="hidden" name="bank" value="bni">
                    <input type="hidden" name="id_package" value="{{$plan->id}}">
                    <input type="hidden" name="order_id" value="{{$orderId}}">
                  <button type="submit" class="p-0 border-0 bg-transparent w-100">
                      <div class="card p-2 text-center">
                          <img src="{{ url('assets-admin') }}/images/bank/BNI.webp" alt="BNI" class="img-fluid" style="max-height: 100px; object-fit: contain;">
                      </div>
                  </button>
              </form>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6 mb-3">
                <form action="{{route('subscription.create')}}" method="post" class="w-100">
                  @csrf
                  <input type="hidden" name="bank" value="mandiri">
                    <input type="hidden" name="id_package" value="{{$plan->id}}">
                    <input type="hidden" name="order_id" value="{{$orderId}}">
                  <button type="submit" class="p-0 border-0 bg-transparent w-100">
                      <div class="card p-2 text-center">
                          <img src="{{ url('assets-admin') }}/images/bank/MANDIRI.webp" alt="MANDIRI" class="img-fluid" style="max-height: 100px; object-fit: contain;">
                      </div>
                  </button>
              </form>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6 mb-3">
                  <form action="{{route('subscription.create')}}" method="post" class="w-100">
                    @csrf
                    <input type="hidden" name="bank" value="qris">
                    <input type="hidden" name="id_package" value="{{$plan->id}}">
                    <input type="hidden" name="order_id" value="{{$orderId}}">
                    <button type="submit" class="p-0 border-0 bg-transparent w-100">
                        <div class="card p-2 text-center">
                            <img src="{{ url('assets-admin') }}/images/bank/QRIS.webp" alt="QRIS" class="img-fluid" style="max-height: 100px; object-fit: contain;">
                        </div>
                    </button>
                </form>
                
                                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="text-center">Ringkasan Pesanan</h5>
              <hr>
              <p class="text-center">Id Order: {{$orderId}}</p>
              <div class="d-flex justify-content-evenly">
                <div class="text-start col-lg-6">
                  <p>Paket {{$plan->name}}</p>
                  <p>Biaya admin</p>
                </div>
                <div class="text-end col-lg-6">
                  <p>Rp. {{ number_format($plan->price, 0, ',', '.') }}</p>
                  <p>Rp. 2.500</p>
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-evenly">
                <div class="text-start col-lg-6">
                  <h4>Total</h4>
                </div>
                <div class="text-end col-lg-6">
                  <h4>Rp. {{ number_format($plan->price+2500, 0, ',', '.') }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ url('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('assets') }}/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('assets') }}/vendor/aos/aos.js"></script>
  <script src="{{ url('assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ url('assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ url('assets') }}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ url('assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ url('assets') }}/js/main.js"></script>

</body>

</html>
{{-- <h2>Invoice</h2>
<p>Order ID: {{ $transaction->order_id }}</p>
<p>Harga: Rp{{ number_format($transaction->amount, 0, ',', '.') }}</p>
<p>Bank: {{ strtoupper($midtrans->va_numbers[0]->bank) }}</p>
<p>Virtual Account: {{ $midtrans->va_numbers[0]->va_number }}</p> --}}