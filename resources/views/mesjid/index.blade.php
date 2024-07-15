@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/layoutMaster')
@section('title', "Mesjid")
@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/clipboard/clipboard.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/js/extended-ui-misc-clipboardjs.js')}}"></script>
<script src="{{asset('assets/js/mesjid/addmesjid.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByPx-qhpqoLp8tfelpEppFIedOvu2h8aM&callback=initMap"></script>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mesjid</h4>
    <!-- DataTable with Buttons -->
    <div class="card">
      <div class="card-header header-elements">
        <h5 class="card-header">Daftar Mesjid</h5>
        <div class="card-header-elements ms-auto">
          <button type="button" class="btn btn-primary waves-effect waves-light" data-ref="" data-bs-target="#addUser" data-bs-toggle="modal">
            <span class="tf-icon ti ti-plus me-1"></span>Add Mesjid
          </button>
        </div>
      </div>
      <div class="card-datatable table-responsive card-body">
        <table class="table table-data" id="dttable">
          <thead class="table-light">
            <tr>
              <th>Nama Mesjid</th>
              <th>Alamat</th>
              <th>PIC</th>
              <th>Link</th>
              <th>#</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
</div>
@include('mesjid.page-modal-mesjid-add')
@endsection
@section('page-script')
<script type="text/javascript">
   $table = $("#dttable").DataTable({
      processing: true,
      serverSide: true,
      "pageLength": 10,
      "columnDefs": [
                      { "targets": [1]},
                      { "targets": [0], "orderable": true }
                  ],
      ajax: {
          "url": "{{ route('mst.mesjid.view') }}",
          "data": function(d) {
            //   d.form_search_values = $("#form-search").serializeArray();
          }
      },
      "aoColumns": [
            {
                "mData": "nama",
                "searchable": true,
                'class': ''
            },
            {
                "mData": "alamat",
                "searchable": true,
                'class': ''
            },
            {
                "mData": "nama_4",
                "searchable": true,
                'class': ''
            },
            {
                "mData": null,
                "orderable": false,
                "searchable": false,
                'sWidth': '150px',
                'class': 'text-center',
                "mRender": function(data, type, full) {
                    var actions = [];
                    actions.push("<div class='input-group'>");
                    if (full.register_url) {
                      actions.push("<input id='link_"+full.ref+"' type='text' class='form-control' value='"+full.register_url+"'/>");
                      actions.push("<span title='Copy' data-clipboard-action='copy' data-clipboard-target='#link_"+full.ref+"' class='btn btn-sm btn-success clipboard-btn'><i class='fa fa-copy'></i></button>");
                    }
                    actions.push("</div>");
                    return actions.join('');
                }
            },
            {
                "mData": null,
                "orderable": false,
                "searchable": false,
                'sWidth': '150px',
                'class': 'text-center',
                "mRender": function(data, type, full) {
                    var actions = [];
                    actions.push("<div class='btn-group'>");
                    if (full.edit_url) {
                      actions.push("<a data-toggle='tooltip' title='View' href='" + full.view_url + "' class='btn btn-sm btn-success'><i class='fa fa-eye'></i></a>");
                    }
                    if (full.edit_url) {
                        actions.push("<a data-toggle='tooltip' title='Edit' data-ref='"+full.ref+"' href='" + full.edit_url + "' data-bs-target='#addUser' data-bs-toggle='modal' class='btn btn-sm btn-warning'><i class='fa fa-edit'></i></a>");
                    }
                    if (full.delete_url) {
                        actions.push("<a data-toggle='tooltip' title='Delete' link='" + full.delete_url + "' class='btn btn-sm btn-danger btn-delete'><i class='fa fa-trash'></i></a>");
                    }
                    actions.push("</div>");
                    return actions.join('');
                }
            }
        ]
  });
$('#editUser').on('shown.bs.modal', function(event) {
    let reference_tag = $(event.relatedTarget); 
    let ref = reference_tag.data('ref');
    if(ref != ""){
      var json_url = "/getmesjid/"+ref;
      $.getJSON(json_url,function(data){
        if(data.success){
          $("#ref").val(data.data.ref);
          $("#nama").val(data.data.nama);
          $("#alamat").val(data.data.alamat);
          $("#phone").val(data.data.no_tlp);
          $("#email").val(data.data.email);
        }
      });
    }
})
$('#addUser').on('shown.bs.modal', function(event) {
  document.getElementById("frmMesjid").reset();
  loadProvinsi();
  let reference_tag = $(event.relatedTarget); 
  let ref = reference_tag.data('ref');
  if(ref != ""){
    var json_url = "/getmesjid/"+ref;
      $.getJSON(json_url,function(data){
        if(data.data != null){
          $("#ref").val(data.data.ref);
          $("#nama").val(data.data.nama);
          $("#alamat").val(data.data.alamat);
          $("#nama_1").val(data.data.nama_1);
          $("#sebagai_1").val(data.data.sebagai_1);
          $("#no_tlp_1").val(data.data.no_tlp_1);
          $("#nama_2").val(data.data.nama_2);
          $("#sebagai_2").val(data.data.sebagai_2);
          $("#no_tlp_2").val(data.data.no_tlp_2);
          $("#nama_3").val(data.data.nama_3);
          $("#sebagai_3").val(data.data.sebagai_3);
          $("#no_tlp_3").val(data.data.no_tlp_3);
          $("#nama_4").val(data.data.nama_4);
          $("#no_tlp_4").val(data.data.no_tlp_4);
          $("#email").val(data.data.email);
          $("#lat").val(data.data.latitude);
          $("#long").val(data.data.longitude);
          (data.data.status == '1') ? $('#is_active').attr('checked', 'checked') : '';
          $("#provinsi").val(data.data.provinsi);
          loadKabupaten(data.data.provinsi,data.data.kabupaten);
          $("#slckabupaten").val(data.data.kabupaten);
          setpoint(data.data.latitude,data.data.longitude);
          (data.data.files != '') ? $('.lampiranview').attr('href', data.data.url_lampiran) : '#';
          if(data.data.files != "")
            $(".divlampiranview").show();
        }
      });
  }
})
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

 $(".divlampiranview").hide();

$('body').on('click','.btn-delete',function () { 
  Swal.fire({
    title: 'Anda Yakin?',
    text: "Hapus data ini!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
    if (result.isConfirmed) {
        var postForm = { 
            '_token'    : "{{ csrf_token() }}",
            'link'      : $(this).attr("link"),
        };
		$.ajax({    
		 	type: "POST",
			url: $(this).attr("link"),
			data: postForm,
			success: function(data){ 
                if(data.success){
                    Swal.fire({
                        text: "Berhasil,"+data.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, Terimakasih!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
                        $table.ajax.reload(null,true);
                    });
                    
                }
                else {
                    Swal.fire({
                        text: "Maaf, Ada kesalahan "+data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, Saya Perbaiki!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
			},
            error: function (jqXHR, textStatus, errorMessage) {
                Swal.fire({
                    text: "Maaf, Ada kesalahan "+errorMessage,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, Saya perbaiki!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            },
        });
    }
    })
}); 
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
initMap();
</script>
@endsection