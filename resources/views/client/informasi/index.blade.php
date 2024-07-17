@extends('layouts.client.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <section class="features-overview" id="faq-section">
            <div class="content-header text-center">
                <h2>Pertanyaan <span style="color: #1075B0;">Sering </span> Ditanyakan <span style="font-weight: 600">(FAQ)</span></h2>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                    <h4 class="m-0 text-center text-lg-left">Apa itu Modal Berkah?</h4>
                    <div class="col-lg-7 col-xl-12 p-0">
                        <p class="py-4 m-0 text-muted text-center text-lg-left justify-text-mobile">Modal Berkah merupakan program keumatan berbasis lembaga/mesjid yang bertujuan untuk menghimpun dan menyalurkan infaq dalam bentuk pinjaman dana kepada pelaku UMKM tanpa adanya riba.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                    <h4 class="m-0 text-center text-lg-left">Apa syarat untuk mendapatkan pinjaman di Modal Berkah?</h4>
                    <div class="col-lg-7 col-xl-12 p-0">
                        <p class="py-4 m-0 text-muted text-center text-lg-left justify-text-mobile">Untuk mendapatkan pinjaman di Modal Berkah diwajibkan untuk memiliki Usaha Mikro Kecil Menengah (UMKM) dan memiliki media untuk berwirausaha.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 flex-item grid-margin" data-aos="fade-right">
                    <h4 class="m-0 text-center text-lg-left">Apakah Modal Berkah Berbunga?</h4>
                    <div class="col-lg-7 col-xl-12 p-0">
                        <p class="py-4 m-0 text-muted text-center text-lg-left justify-text-mobile">Tidak, karena dalam pinjaman Modal Berkah tidak ada kewajiban lainya selain membayar pokok pinjaman.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                    <h4 class="m-0 text-center text-lg-left">Apakah NonMuslim bisa pinjam di Modal Berkah</h4>
                    <div class="col-lg-9 col-xl-12 p-0">
                        <p class="py-4 m-0 text-muted text-center text-lg-left justify-text-mobile">Bisa, Modal Berkah dapat melayani semua lapisan masyarakat.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

<style>
@media (max-width: 767px) {
    .justify-text-mobile {
        text-align: justify;
    }
}
</style>