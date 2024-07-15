@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Register - Pages')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/js/member/register.js')}}"></script>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Register Member Mesjid "{{ $dataMesjid ? $dataMesjid->nama : ""}}"</h4>
    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">
      <h5 class="card-header">Silahkan Lengkapi Data</h5>
      <form id="frmRegister" class="card-body" method="POST" action="{{route('mst.member.store')}}">
        @csrf
        <input type="hidden" id="ref_mesjid" name="ref_mesjid" class="form-control" value="{{$dataMesjid->ref}}">
        <h6>1. Account Details</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label" for="multicol-username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="john.doe">
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-email">Email</label>
            <div class="input-group input-group-merge">
              <input type="text" id="email"name="email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="multicol-email2">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-password-toggle">
              <label class="form-label" for="multicol-password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" name ="password" class="form-control" placeholder="············" aria-describedby="multicol-password2">
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-password-toggle">
              <label class="form-label" for="multicol-confirm_password">Confirm Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="············" aria-describedby="multicol-confirm-password2">
                <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4 mx-n4">
        <h6>2. Info Usaha/Personal</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label" for="multicol-first-name">Nama Usaha</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-fullname" class="input-group-text"><i class="ti ti-building"></i></span>
              <input type="text" id="nama_usaha" name="nama_usaha" class="form-control" placeholder="PT." aria-label="PT." aria-describedby="basic-icon-default-company2">
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-nama_pemilik">Nama Pemilik Usaha</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-user"></i></span>
              <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" placeholder="" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
            </div>
          </div>
          <div class="col-md-12">
            <label class="form-label" for="multicol-country">Jenis Usaha</label>
            <select id="jenis_usaha" name="jenis_usaha" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="2">Select</option>
            </select>
          </div>
          <div class="mb-12">
            <label class="form-label" for="basic-default-message">Alamat</label>
            <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control" placeholder=""></textarea>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-provinsi">Provinsi</label>
            <select id="provinsi" name="provinsi" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="2">Select</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-email">Kabupaten</label>
            <div class="input-group input-group-merge">
              <select id="slckabupaten" name="kabupaten" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                <option value="" data-select2-id="2">Select</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-kecamatan">Kecamatan</label>
            <select id="kecamatan" name="kecamatan" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="2">Select</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-kelurahan">Kelurahan</label>
            <div class="input-group input-group-merge">
              <select  id="kelurahan" name="kelurahan" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                <option value="" data-select2-id="2">Select</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-rt">RT</label>
            <input type="text" id="rt" name="rt" class="form-control" placeholder="">
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-rw">RW</label>
            <div class="input-group input-group-merge">
              <input type="text" id="rw" name="rw" class="form-control" placeholder="" aria-label="john.doe" aria-describedby="multicol-email2">
            </div>
          </div>
          <div class="col-md-12">
            <label class="form-label" for="multicol-country">Status Tempat Usaha</label>
            <select id="status_tempat" name="status_tempat" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="2">Select</option>
              <option value="1">Milik Keluarga</option>
              <option value="2">Milik Sendiri</option>
              <option value="3">Sewa</option>
            </select>
          </div>
          <div class="col-md-12">
            <label class="form-label" for="multicol-country">Legalitas Badan Usaha</label>
            <select id="badan_usaha" name="badan_usaha" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="2">Select</option>
              <option value="1">Sudah Memiliki</option>
              <option value="2">Belum Memiliki</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-country">NPWP dan Pelaporan</label>
            <div class="col mt-2">
              <div class="form-check form-check-inline">
                <input name="npwp_pelaporan" class="form-check-input" type="radio" value="1" id="collapsible-address-type-home">
                <label class="form-check-label" for="collapsible-address-type-home">Sudah Punya</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="npwp_pelaporan" class="form-check-input" type="radio" value="0">
                <label class="form-check-label" for="collapsible-address-type-office">
                  Belum Punya
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-country">Laporan Keuangan</label>
            <div class="col mt-2">
              <div class="form-check form-check-inline">
                <input name="laporan_keuangan" class="form-check-input" type="radio" value="1">
                <label class="form-check-label" for="collapsible-address-type-home">Sudah Punya</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="laporan_keuangan" class="form-check-input" type="radio" value="0">
                <label class="form-check-label" for="collapsible-address-type-office">
                  Belum Punya
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          </div>
          <div class="col-md-6">
            <div class="form-check">
              <input class="form-check-input" name="laporan_laba_rugi" type="checkbox" value="1">
              <label class="form-check-label" for="deliveryAdd">
                Laporan Laba-rugi
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="laporan_neraca" type="checkbox" value="1">
              <label class="form-check-label" for="deliveryAdd">
                Laporan Neraca
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="laporan_arus_kas" type="checkbox" value="">
              <label class="form-check-label" for="deliveryAdd">
                Laporan Arus Kas
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <label class="form-label" for="multicol-country">Akses Pemodalan</label>
            <div class="col mt-2">
              <div class="form-check form-check-inline">
                <input name="akses_permodalan" class="form-check-input" type="radio" value="1">
                <label class="form-check-label" for="collapsible-address-type-home">Sudah Punya</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="akses_permodalan" class="form-check-input" type="radio" value="0">
                <label class="form-check-label" for="collapsible-address-type-office">
                  Belum Punya
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-birthdate">Mulai Beroperasi</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-calendar"></i></span>
              <input type="text" id="mulai_beroperasi" name="mulai_beroperasi" class="form-control dob-picker flatpickr-input" readonly="readonly">
            </div>
            
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-phone">Phone No</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-phone"></i></span>
              <input type="text" id="no_ponsel" name="no_ponsel" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
            </div>
          </div>
        </div>
        <div class="pt-4">
          <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
          <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
        </div>
      </form>
    </div>

    
  </div>
  <!-- / Content -->

  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
      <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
        <div>
          ©2023 <a href="#" target="_blank" class="fw-semibold">ModalBerkah</a>
        </div>
        <div>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>
 
@endsection
@section('page-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script>
LoadjenisUsaha();
function LoadjenisUsaha(){
  var json_url = "{{'/'}}"+"api/jenisusaha/all";
     $.getJSON(json_url,function(data){
         $("#jenis_usaha").empty(); 
         if(data==""){
             $("#jenis_usaha").append("<option value=\"\">Select</option>");
         }
         else{
             $("#jenis_usaha").append("<option value=\"\">Select</option>");
             for(i=0; i<data.id.length; i++){
                 $("#jenis_usaha").append("<option value=\"" + data.id[i]  + "\">" + data.text[i] +"</option>");
             }
         }
         
     });
     return false;
}
loadProvinsi();
function loadProvinsi(){
  var json_url = "{{'/'}}"+"api/provinsi/all";
     $.getJSON(json_url,function(data){
         $("#provinsi").empty(); 
         if(data==""){
             $("#provinsi").append("<option value=\"\">Select</option>");
         }
         else{
             $("#provinsi").append("<option value=\"\">Select</option>");
             for(i=0; i<data.id.length; i++){
                 $("#provinsi").append("<option value=\"" + data.id[i]  + "\">" + data.text[i] +"</option>");
             }
         }
         
     });
     return false;
}
$("#provinsi").change(function(){
    let idProvinsi = $("#provinsi").val();
    loadKabupaten(idProvinsi,value = '');
}); 
function loadKabupaten(idProvinsi,value){
  $("#slckabupaten").empty().append("<option>loading...</option>"); //show loading...
  let json_url = "{{'/'}}"+"api/kabupaten/prov/"+idProvinsi;
  $.getJSON(json_url,function(data){
      $("#slckabupaten").empty(); 
      if(data==""){
          $("#slckabupaten").append("<option value=\"\">Select</option>");
      }
      else{
          $("#slckabupaten").append("<option value=\"\">Select</option>");
          for(i=0; i<data.id.length; i++){
              if(value == data.id[i])
                $("#slckabupaten").append("<option value=\"" + data.id[i]  + "\" selected>" + data.text[i] +"</option>");
              else
                $("#slckabupaten").append("<option value=\"" + data.id[i]  + "\">" + data.text[i] +"</option>");
          }
      }
      
  });
}
$("#slckabupaten").change(function(){
    let idKabupaten = $("#slckabupaten").val();
    loadKecamatan(idKabupaten,value = '');
}); 
function loadKecamatan(kabupaten,value){
  $("#kecamatan").empty().append("<option>loading...</option>"); //show loading...
  let json_url = "{{'/'}}"+"api/kecamatan/kab/"+kabupaten;
  $.getJSON(json_url,function(data){
      $("#kecamatan").empty(); 
      if(data==""){
          $("#kecamatan").append("<option value=\"\">Select</option>");
      }
      else{
          $("#kecamatan").append("<option value=\"\">Select</option>");
          for(i=0; i<data.id.length; i++){
              if(value == data.id[i])
                $("#kecamatan").append("<option value=\"" + data.id[i]  + "\" selected>" + data.text[i] +"</option>");
              else
                $("#kecamatan").append("<option value=\"" + data.id[i]  + "\">" + data.text[i] +"</option>");
          }
      }
      
  });
}
$("#kecamatan").change(function(){
    let idKecamatan = $("#kecamatan").val();
    loadKelurahan(idKecamatan,value = '');
}); 
function loadKelurahan(kecamatan,value){
  $("#kelurahan").empty().append("<option>loading...</option>"); //show loading...
  let json_url = "{{'/'}}"+"api/keluarahan/kec/"+kecamatan;
  $.getJSON(json_url,function(data){
      $("#kelurahan").empty(); 
      if(data==""){
          $("#kelurahan").append("<option value=\"\">Select</option>");
      }
      else{
          $("#kelurahan").append("<option value=\"\">Select</option>");
          for(i=0; i<data.id.length; i++){
              if(value == data.id[i])
                $("#kelurahan").append("<option value=\"" + data.id[i]  + "\" selected>" + data.text[i] +"</option>");
              else
                $("#kelurahan").append("<option value=\"" + data.id[i]  + "\">" + data.text[i] +"</option>");
          }
      }
      
  });
}
$(".flatpickr-input").flatpickr({
    enableTime: false,
    dateFormat: "d-m-Y",
});
</script>
@endsection
