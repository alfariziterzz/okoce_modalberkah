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
<script src="{{asset('assets/vendor/libs/clipboard/clipboard.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/js/extended-ui-misc-clipboardjs.js')}}"></script>
<script src="{{asset('assets/js/mesjid/registermesjid.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByPx-qhpqoLp8tfelpEppFIedOvu2h8aM&callback=initMap"></script>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Register Mesjid</h4>
    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">
      <h5 class="card-header">Silahkan Lengkapi Data</h5>
      <form id="frmMesjid" class="card-body" method="POST" action="{{route('mst.mesjid.storeregister')}}">
        @csrf
        <div class="row g-3">
        <input type="hidden" id="ref" name="ref" class="form-control"/>
        <div class="col-12 col-md-12">
          <label class="form-label" for="nama">Nama Mesjid</label>
          <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Mesjid"/>
        </div>
        <div class="col-md-6">
          <label class="form-label" for="multicol">Provinsi</label>
          <select id="provinsi" name="provinsi" class="select2 form-select" data-allow-clear="true">
            <option value="">Select</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label" for="multicol-email">Kabupaten</label>
          <div class="input-group input-group-merge">
            <select id="slckabupaten" name="kabupaten" class="select2 form-select">
              <option value="">Select</option>
            </select>
          </div>
        </div>
        <div class="col-12">
          <label class="form-label" for="address">Alamat</label>
          <textarea rows="5" class="form-control" id="alamat" name="alamat"></textarea>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Pengurus 1</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-user"></i></span>
            <input type="text" id="nama_1" class="form-control phone-mask" name="nama_1" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Sebagai</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"></span>
            <input type="text" id="sebagai_1" name="sebagai_1" class="form-control phone-mask" name="sebagai_1" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Phone Number</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-phone"></i></span>
            <input type="text" id="no_tlp_1" class="form-control phone-mask" name="no_tlp_1" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Pengurus 2</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-user"></i></span>
            <input type="text" id="nama_2" class="form-control phone-mask" name="nama_2" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Sebagai</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"></span>
            <input type="text" id="sebagai_2" name="sebagai_2" class="form-control phone-mask" name="sebagai_2" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Phone Number</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-phone"></i></span>
            <input type="text" id="no_tlp_2" class="form-control phone-mask" name="no_tlp_2" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Pengurus 3</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-user"></i></span>
            <input type="text" id="nama_3" class="form-control phone-mask" name="nama_3" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Sebagai</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"></span>
            <input type="text" id="sebagai_3" name="sebagai_3" class="form-control phone-mask" name="sebagai_3" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Phone Number</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-phone"></i></span>
            <input type="text" id="no_tlp_3" class="form-control phone-mask" name="no_tlp_3" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">PIC</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-user"></i></span>
            <input type="text" id="nama_4" class="form-control phone-mask" name="nama_4" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label" for="modalEditUserPhone">Phone Number</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-phone"></i></span>
            <input type="text" id="no_tlp_4" class="form-control phone-mask" name="no_tlp_4" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        
        <div class="col-12 col-md-4">
          <label class="form-label" for="email">Email</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-mail"></i></span>
            <input type="text" id="email" class="form-control phone-mask" name="email" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        
        <div class="col-12 col-md-6">
          <label class="form-label" for="modalEditUserPhone">Latitude</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-map"></i></span>
            <input type="text" id="lat" class="form-control phone-mask" name="lat" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        
        <div class="col-12 col-md-6">
          <label class="form-label" for="email">Longitude</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-map"></i></span>
            <input type="text" id="long" class="form-control phone-mask" name="long" aria-describedby="basic-icon-default-phone2">
          </div>
        </div>
        
        <div class="col-12 col-md-12">
          <div id="map" style="width:100%; height:200px"></div>
        </div>
        <div class="col-12 col-md-11">
          <div class="input-group">
            <input type="file" class="form-control" id="files" name="files" />
          </div>
        </div>
        <div class="col-12 col-md-1 divlampiranview">
          <div class="input-group">
            <a href="" target="_blank" class="lampiranview"><span class="input-group-text btn-primary"><i class="ti ti-file"></i></span></a>
          </div>
        </div>
        <h6>2. Account Details</h6>
          <div class="col-md-12">
            <label class="form-label" for="multicol-username">Username</label>
            <input type="text" id="auth_username" name="auth_username" class="form-control" placeholder="john.doe">
          </div>
          <div class="col-md-6">
            <div class="form-password-toggle">
              <label class="form-label" for="multicol-password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" name="password" id="password" class="form-control">
                <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-password-toggle">
              <label class="form-label" for="multicol-confirm-password">Confirm Password</label>
              <div class="input-group input-group-merge">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
          </div>
        <div class="col-12 text-center">
          <button type="submit" id="btnsave" class="btn btn-primary me-sm-3 me-1">Submit</button>
          <button type="reset" class="btn btn-label-secondary" id="btn-tutup" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
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
var peta;
var jenis = ""; 
var tanda = ""; 
var gambar_tanda="";
var defaultlat = "-6.652007069556113";
var defaultlong = "106.62911743750003";
function initMap() {
  var jakarta = new google.maps.LatLng(defaultlat,defaultlong);
  var petaoption = {
  zoom: 5,
  center: jakarta
  };
  peta = new google.maps.Map(document.getElementById("map"),petaoption);
  google.maps.event.addListener(peta,'click',function(event){
    addpoint(event.latLng);
  });
  setpoint(defaultlat,defaultlong);
}
function setpoint(koordinat_xx = "",koordinat_yy = ""){
  if(koordinat_xx != ""){
    var point = new google.maps.LatLng(
      parseFloat(koordinat_xx)
      ,
      parseFloat(koordinat_yy));
    tanda = new google.maps.Marker({
      position: point,
      map: peta,
      icon: gambar_tanda
    });
  }
}
function addpoint(lokasi){
    tanda.setMap(null);
    set_icon(jenis);
    tanda = new google.maps.Marker({
      position: lokasi,
      map: peta,
      icon: gambar_tanda
  });
  $("#long").val(lokasi.lng()); //long / Y
  $("#lat").val(lokasi.lat()); // lat = x
}
function set_icon(jenis){
  switch(jenis){
    case "company":
      gambar_tanda = 'icon/point.png';
  }
}
$(".divlampiranview").hide();
initMap();
</script>
@endsection
