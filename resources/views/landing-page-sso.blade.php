@extends('layouts.client.app')

@section('content')
<div class="container-wrapper">
  <div class="banner">
    <div class="container">
      <h1 class="font-weight-semibold">MODAL BERKAH</h1>
      <h6 class="font-weight-normal text-muted pb-3">Merupakan program keumatan berbasis lembaga atau masjid yang bertujuan untuk menghimpun dan menyalurkan infaq dalam bentuk pinjaman dana kepada pelaku UMKM tanpa adanya riba</h6>
      <p class="font-weight-normal text-muted pb-3">Support By</p>
      <div>
        <img src="{{ asset('assets/img/logo-okoce.png') }}" width="100" class="img-fluid">
        <img src="{{ asset('assets/img/logo-gerakan-sosial.png') }}" width="100" alt="gerakan sosial Ok Oce" class="img-fluid">
      </div>
      <div>
        <a href={{ route('mesjid.register') }} class="btn btn-opacity btn-info ml-1">Registrasi Mesjid Sekarang</a>
      </div>
      <img src="{{ asset('assets/landing-page-sso/images/Group171.svg') }}" alt="" class="img-fluid">
    </div>
  </div>
</div>
<div class="content-wrapper">
  <div class="container">
    <section class="features-overview" id="features-section">
      <div class="content-header">
        <h2 style="color: #1075B0;">Program apa yang akan dilakukan?</h2>
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
            <h2 style="color: #1075B0;">Solusi Kemajuan UMKM tanpa Riba, Dimulai Dari Sini</h2>
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
    <section class="case-studies" id="gallery-section">
      <div class="row grid-margin">
        <div class="col-12 text-center pb-5">
          <h2 style="color: #1075B0;">Berita Terkini</h2>
        </div>
      </div>
      <div class="row">
      <div class="col-md-4">
          <div class="card">
            <img src="{{ asset('assets/landing-page-sso/images/4.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column text-center">
              <h5 class="card-title">Gandeng masjid di Yogyakarta, Sandiaga Uno luncurkan Modal Berkah</h5>
              <p class="card-text">Sandiaga Uno meluncurkan program Modal Berkah bagi pelaku UMKM binaan Masjid Jogokariyan, Kota Yogyakarta, Senin (29/8).</p>
              <div class="mt-auto">
                <a href="#" class="btn btn-primary btn-block">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="{{ asset('assets/landing-page-sso/images/4.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column text-center">
              <h5 class="card-title">Gandeng masjid di Yogyakarta, Sandiaga Uno luncurkan Modal Berkah</h5>
              <p class="card-text">Sandiaga Uno meluncurkan program Modal Berkah bagi pelaku UMKM binaan Masjid Jogokariyan, Kota Yogyakarta, Senin (29/8).</p>
              <div class="mt-auto">
                <a href="#" class="btn btn-primary btn-block">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="{{ asset('assets/landing-page-sso/images/4.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column text-center">
              <h5 class="card-title">Gandeng masjid di Yogyakarta, Sandiaga Uno luncurkan Modal Berkah</h5>
              <p class="card-text">Sandiaga Uno meluncurkan program Modal Berkah bagi pelaku UMKM binaan Masjid Jogokariyan, Kota Yogyakarta, Senin (29/8).</p>
              <div class="mt-auto">
                <a href="#" class="btn btn-primary btn-block">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-custom">
    <div class="modal-content w-auto mx-auto">
      <div class="modal-body" style="padding-bottom:20px;padding-top:20px;">
        <img src="" class="imagepreview" style="width: 100%;">
      </div>
    </div>
  </div>
</div>
@endsection

<style>
  .card {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }
  .card-body {
    padding: 20px;
  }
  .btn-primary {
    background-color: #1075B0;
    border: none;
  }
  .btn-primary.btn-block {
    width: 100%;
  }
  .card-img-top {
    height: 200px;
    object-fit: cover;
  }
  .card-body.text-center {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .card-title {
    margin-bottom: 15px;
  }
</style>