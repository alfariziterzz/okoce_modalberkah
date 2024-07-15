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
  <style>
    .card-image{
      height:200px;
      line-height:200px;
      overflow:hidden;
      text-align:center;
      width:320px;
      margin:10px;
    }
    .card-image img{
      height: 240px;    
      margin: -100%;
      max-width: none;
      width: auto;    
    }
    .modal-custom {
        max-width: 90%;
    }
    .btn-blue {
      background-color: blue;
      color: white;
    }
    .btn-red {
      background-color: red;
      color: white;
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
            <a class="nav-link" href="#header-section">BERANDA<span class="sr-only">(current)</span></a>
          </li>
          <li>
            <a href="/saran"
                class="bg-[#434343] hover:text-[#FFF100] md:bg-transparent {{ Route::currentRouteName() == 'saran' ? 'text-white bg-[#FFF100] text-sm' : 'text-white text-sm' }} rounded lg:bg-transparent  {{ Route::currentRouteName() == 'saran' ? 'lg:text-[#FFF100]' : 'lg:text-grey-700' }} block pl-3 pr-4 py-2 md:p-0 rounded focus:outline-none">SARAN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features-section">TENTANG KAMI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery-section">GALERI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#faq-section">BERITA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact-section">INFORMASI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#zakat">DONASI</a>
          </li>
          <li class="nav-item ml-0 pl-4 pl-lg-0">
              <a href={{ route('mesjid.register')}} class="btn btn-red"><i class="fa fa-user-plus"></i>Register</a>
            </li>
            <li class="nav-item ml-0 ml-lg-2 pl-4 pl-lg-0">
              <a href={{ route('auth-login-basic')}} class="btn btn-blue"><i class="fa fa-sign-in"></i>Login</a>
            </li>
        </ul>
      </div>
    </div>
    </nav>
  </header>
  <section class="bg-white">
        @yield('content')
    </section>
  <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2024<a href="#" class="px-1">Modal Berkah.</a>All rights reserved.</p>
      </footer>
    </div>
  </div>
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

    console.log(document.body.scrollTop)
  </script>
</body>
</html>