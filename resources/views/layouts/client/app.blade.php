<!DOCTYPE html>
<html lang="en">
<head>
  <title>Modal Berkah</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('assets/landing-page-sso/vendors/owl-carousel/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing-page-sso/vendors/owl-carousel/css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing-page-sso/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing-page-sso/vendors/aos/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing-page-sso/css/style.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .card-image {
      height: 200px;
      line-height: 200px;
      overflow: hidden;
      text-align: center;
      width: 320px;
      margin: 10px;
    }
    .card-image img {
      height: 240px;
      margin: -100%;
      max-width: none;
      width: auto;
    }
    .modal-custom {
      max-width: 90%;
    }
    .btn-blue {
      background-color: #1075B0;
      color: white;
    }
    .btn-red {
      background-color: #E3242B;
      color: white;
    }
    .blue-box {
      background-color: white;
      padding: 20px 0;
      text-align: center;
    }
    .blue-box p {
      color: black;
      margin-bottom: 0;
    }
    .navbar-nav .nav-item.donation {
      margin-right: 20px; /* Adjust this value to increase or decrease the space */
    }
    .footer-box {
      background-color: #1075B0;
      color: white;
      padding: 10px;
      text-align: center;
      border-top-left-radius: 30px;
      border-top-right-radius: 30px;
    }
    .navbar-nav .nav-item .nav-link.active {
      color: #E3242B !important;
    }
    @media (max-width: 767px) {
      .contact-info {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
      }
      .contact-info a {
        margin: 5px 10px;
      }
    }
    .contact-info a {
      margin: 0 15px;
    }
  </style>
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
      <div class="container">
        <div class="navbar-brand-wrapper d-flex w-100">
          @include('_partials.macros',["height"=>70,"withbg"=>'fill: #fff;'])
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="mdi mdi-menu navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
            <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
              <div class="navbar-collapse-logo">
                <img src="http://127.0.0.1:8000/assets/img/mesjid.png" height="30" alt="">
              </div>
              <div class="navbar-collapse-logo">
                <img src="http://127.0.0.1:8000/assets/img/logo.png" height="30" alt="">
              </div>
              <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
              </button>
              </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">BERANDA<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('gallery-section') ? 'active' : '' }}" href="{{ url('/') }}">GALERI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('news-section') ? 'active' : '' }}" href="{{ url('/') }}">BERITA</a>
            </li>
            <li class="nav-item information">
              <a class="nav-link {{ Request::is('informasi') ? 'active' : '' }}" href="{{ route('informasi') }}">INFORMASI</a>
            </li>
            <li class="nav-item donation">
              <a class="nav-link {{ Request::is('donasi') ? 'active' : '' }}" href="{{ route('donasi') }}">DONASI</a>
            </li>
            <li class="nav-item ml-0 pl-4 pl-lg-0">
              <a href={{ route('mesjid.register')}} class="btn btn-red">Daftar</a>
            </li>
            <li class="nav-item ml-0 ml-lg-2 pl-4 pl-lg-0">
              <a href={{ route('auth-login-basic')}} class="btn btn-blue">Masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="bg-white">
    @yield('content')
  </section>
  

  <footer>
  <div class="blue-box">
    <div class="container">
    <p class="font-weight-normal text-muted pb-3">Support By</p>
      <div>
        <img src="{{ asset('assets/img/okoce.png') }}" width="100" class="img-fluid">
        <img src="{{ asset('assets/img/okocekemanusiaan.png') }}" width="100" class="img-fluid">
        <img src="{{ asset('assets/img/gerakansosial.png') }}" width="100" alt="gerakan sosial Ok Oce" class="img-fluid">
      </div>
      <strong><p>Perkumpulan Gerakan OK OCE Indonesia</p></strong>
      <p style="color: grey;">Jl. Tebet Barat Dalam VII No.3, RT.9/RW.6, Tebet Barat, Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810</p>
      <br>
      <strong><p>Contact Info</p></strong>
      <div class="contact-info">
        <a href="https://wa.me/6281234567890" target="_blank" style="color: grey;"><i class="fab fa-whatsapp"></i> 0817220855</a>
        <a href="mailto:modalberkah.indonesia@gmail.com" target="_blank" style="color: grey;"><i class="fas fa-envelope"></i> modalberkah.indonesia@gmail.com </a>
        <a href="https://instagram.com/modal.berkah" target="_blank" style="color: grey;"><i class="fab fa-instagram"></i> @modal.berkah</a>
      </div>
    </div>
  </div>
    <div class="footer-box">
    <div class="container">
      <p class="text-center p-0 m-0">Copyright © 2024<a href="#" class="px-1" style="color: #E3242B;">Modal Berkah.</a>All rights reserved.</p>
    </div>
  </footer>
  <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-custom">
      <div class="modal-content w-auto mx-auto">              
        <div class="modal-body" style="padding-bottom:20px;padding-top:20px;">
          <img src="" class="imagepreview" style="width: 100%;" >
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/landing-page-sso/vendors/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/landing-page-sso/vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/landing-page-sso/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/landing-page-sso/vendors/aos/js/aos.js') }}"></script>
  <script src="{{ asset('assets/landing-page-sso/js/landingpage.js') }}"></script>
  <script>
    $(function() {
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
      });		
    });
  </script>
</body>
</html>