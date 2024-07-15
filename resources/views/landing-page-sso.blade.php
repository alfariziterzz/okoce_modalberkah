@extends('layouts.client.app')

@section('content')
<div class="container-wrapper">
  <div class="banner" >
    <div class="container">
      <h1 class="font-weight-semibold">MODAL BERKAH</h1>
      <h6 class="font-weight-normal text-muted pb-3">Merupakan program keumatan berbasis lembaga atau masjid yang bertujuan untuk menghimpun dan menyalurkan infaq dalam bentuk pinjaman dana kepada pelaku UMKM tanpa adanya riba</h6>
      <p class="font-weight-normal text-muted pb-3">Support By</p>
      <div>
        <img src="{{ asset('assets/img/logo-okoce.png') }}" width="100" class="img-fluid">
        <img src="{{ asset('assets/img/logo-gerakan-sosial.png') }}" width="100" alt="gerakan sosial Ok Oce" class="img-fluid">
      </div>
      <div>
        <a href={{ route('mesjid.register')}} class="btn btn-opacity btn-info ml-1">Registrasi Mesjid Sekarang</a>
      </div>
      <img src="{{ asset('assets/landing-page-sso/images/Group171.svg') }}" alt="" class="img-fluid">
    </div>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="container">
      <section class="features-overview" id="features-section" >
        <div class="content-header">
          <h2>Program apa yang akan dilakukan?</h2>
          <h6 class="section-subtitle text-muted">Yuk Kita Kenal Lebih Dekat Dengan Modal Berkah</h6>
        </div>
        <div class="d-md-flex justify-content-between">
          <div class="grid-margin col-4 justify-content-start">
            <div class="features-width">
              <img src="{{ asset('assets/landing-page-sso/images/Group12.svg') }}" alt="" class="img-icons">
              <h5 class="py-3">Membantu Pelaku UMKM Indonesia</h5>
              <p class="text-muted">Program Modal Berkah hadir untuk memberikan bantuan pinjaman modal kepada para pelaku UMKM yang mengalami kesulitan modal dalam menjalankan usaha</p>
            </div>
          </div>
          <div class="grid-margin col-4 justify-content-center">
            <div class="features-width">
              <img src="{{ asset('assets/landing-page-sso/images/Group7.svg') }}" alt="" class="img-icons">
              <h5 class="py-3">Mengentaskan RIBA</h5>
              <p class="text-muted">Modal Berkah memberikan pinjaman modal bagi para UMKM tanpa adanya riba. Hal ini tentuk saja menjadi solusi dalam membantu mengentaskan riba di masyarakat yang selama ini tergiur pada dana pinjaman online agar beralih pada Modal Berkah tanpa bunga.</p>
            </div>
          </div>
          <div class="grid-margin col-4 justify-content-end">
            <div class="features-width">
              <img src="{{ asset('assets/landing-page-sso/images/Group5.svg') }}" alt="" class="img-icons">
              <h5 class="py-3">Menjalin Kerjasama dan Silaturahmi</h5>
              <p class="text-muted">Program ini merupakan ajakan untuk bersatu dan berbagi dengan sesama. Ketika masyarakat berpartisipasi dalam Modal Berkah, mereka merasakan kehangatan persaudaraan dan kekuatan solidaritas. Semangat gotong royong dalam menebarkan kebaikan semakin terasa.</p>
            </div>
          </div>
        </div>
      </section>
      <section class="case-studies" id="gallery-section">
        <div class="row grid-margin">
          <div class="col-12 text-center pb-5">
            <h2>Solusi Kemajuan UMKM tanpa Riba, Dimulai Dari Sini</h2>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="card-image pop">
                    <img src="{{ asset('assets/landing-page-sso/images/oke1.jpeg') }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="card-image pop">
                    <img src="{{ asset('assets/landing-page-sso/images/foto2.jpeg') }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="card-image pop">
                    <img src="{{ asset('assets/landing-page-sso/images/foto3.jpeg') }}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="card-image pop">
                    <img src="{{ asset('assets/landing-page-sso/images/4.jpeg') }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="features-overview" id="faq-section">
        <div class="content-header">
          <h2>FAQ</h2>
        </div>
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
            <h4 class="m-0">Apa itu Modal Berkah?</h4>
            <div class="col-lg-7 col-xl-12 p-0">
              <p class="py-4 m-0 text-muted">Modal Berkah merupakan program keumatan berbasis lembaga/mesjid yang bertujuan untuk menghimpun dan menyalurkan infaq dalam bentuk pinjaman dana kepada pelaku UMKM tanpa adanya riba.</p>
            </div>
          </div>
          <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
            <h4 class="m-0">Apa syarat untuk mendapatkan pinjaman di Modal Berkah?</h4>
            <div class="col-lg-7 col-xl-12 p-0">
              <p class="py-4 m-0 text-muted">Untuk mendapatkan pinjaman di Modal Berkah diwajibkan untuk memiliki Usaha Mikro Kecil Menengah (UMKM) dan memiliki media untuk berwirausaha.</p>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 flex-item grid-margin" data-aos="fade-right">
            <h4 class="m-0">Apakah Modal Berkah Berbunga?</h4>
            <div class="col-lg-7 col-xl-12 p-0">
              <p class="py-4 m-0 text-muted">Tidak, karena dalam pinjaman Modal Berkah tidak ada kewajiban lainya selain membayar pokok pinjaman.</p>
            </div>
          </div>
          <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
            <h4 class="m-0">Apakah NonMuslim bisa pinjam di Modal Berkah</h4>
            <div class="col-lg-9 col-xl-12 p-0">
              <p class="py-4 m-0 text-muted">Bisa, Modal Berkah dapat melayani semua lapisan masyarakat.</p>
            </div>
          </div>
        </div>
      </section>
      <section class="contact-details" id="contact-section">
        <div class="content-header">
        </div>
        <div class="row text-center text-md-left">
          <div class="col-12 col-md-6 col-lg-6 grid-margin">
            <h4>Contact Info</h4>
              <div class="justify-content-center justify-content-md-start">
                <p><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z"/></svg> 0817220855 </a></p>
                <p><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg> modalberkah.indonesia@gmail.com </a></p>
                <p><a href="https://instagram.com/modal.berkah"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z"/></svg> @modal.berkah </a></p>
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 grid-margin">
              <h5 class="pb-2">Our address</h5>
              <p class="text-muted">OK OCE Kemanusiaan <br>Jl. Tebet Barat Dalam VII No.3, RT.9/RW.6, Tebet Bar., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810</p>
               
          </div>
        </div>
      </section>
      <section id="zakat" class="mb-10">
        <div class="container">
          <center>
            <img src="{{ asset('assets/img/zakat.jpeg') }}" width="50%" class="img-fluid">
          </center>
          <br>
        </div>
      </section>
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
@endsection