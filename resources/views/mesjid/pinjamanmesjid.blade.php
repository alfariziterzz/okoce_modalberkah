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
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/clipboard/clipboard.js')}}"></script>
<script src="{{asset('assets/js/extended-ui-misc-clipboardjs.js')}}"></script>
<script src="{{asset('assets/js/pinjaman/addpinjaman.js')}}"></script>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile / View /</span> Mesjid</h4>
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
              <img
                class="img-fluid rounded mb-3 pt-1 mt-4"
                src="{{ asset('assets/img/logo.png') }}"
                height="100"
                width="100"
                alt="User avatar" />
              <div class="user-info text-center">
                <h4 class="mb-2">{{$dataMesjid->nama}}</h4>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
            <div class="d-flex align-items-start me-4 mt-3 gap-2">
              <div>
                <p class="mb-0 fw-semibold">Link Register member</p>
                <small>{{route('member.register',$dataMesjid->ref)}}</small>
                <input type="hidden" id="link" value="{{route('member.register',$dataMesjid->ref)}}"/>
              </div>
            </div>
            <div class="d-flex align-items-start me-4 mt-3 gap-2">
              <span class="badge bg-label-primary p-2 rounded clipboard-btn" title='Copy' data-clipboard-action='copy' data-clipboard-target='#link'><i class="ti ti-copy ti-sm"></i></span>
              <a href="{{route('member.register',$dataMesjid->ref)}}" class="badge bg-label-primary p-2 rounded clipboard-btn"><i class="ti ti-arrow-right ti-sm"></i></a>
            </div>
          </div>
          <p class="mt-4 small text-uppercase text-muted">Details</p>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-2">
                <span class="fw-semibold me-1">Username:</span>
                <span>{{$dataUser->username}}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Email:</span>
                <span>{{$dataUser->email}}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Status:</span>
                @if ($dataUser->is_active =="1")
                  <span class="badge bg-label-success">Active</span>  
                @else
                  <span class="badge bg-label-danger">InActive</span>  
                @endif
                
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">alamat:</span>
                <span>{{$dataMesjid->alamat}}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Provinsi:</span>
                <span>{{$dataMesjid->o_provinsi ? $dataMesjid->o_provinsi->prov : ""}}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Kabupaten:</span>
                <span>{{$dataMesjid->o_kabupaten ? $dataMesjid->o_kabupaten->kab : ""}}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Pengurus 1 :</span>
                <span>{{$dataMesjid->nama_1}}</span>
                <span>{{$dataMesjid->sebagai_1}}</span>
                <span>{{$dataMesjid->no_tlp_1}}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Pengurus 2 :</span>
                <span>{{$dataMesjid->nama_2}}</span>
                <span>{{$dataMesjid->sebagai_2}}</span>
                <span>{{$dataMesjid->no_tlp_2}}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Pengurus 3 :</span>
                <span>{{$dataMesjid->nama_3}}</span>
                <span>{{$dataMesjid->sebagai_3}}</span>
                <span>{{$dataMesjid->no_tlp_3}}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">PIC :</span>
                <span>{{$dataMesjid->nama_4}}</span>
                <span>{{$dataMesjid->no_tlp_4}}</span>
                <span>{{$dataMesjid->no_tlp_4}}</span>
              </li>
              <li class="mb-2 pt-1">
                <div id="map" style="width:100%; height:200px"></div>
              </li>
            </ul>
          
          </div>
        </div>
      </div>
      <!-- /User Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <!-- User Pills -->
      <ul class="nav nav-pills flex-column flex-md-row mb-4">
        <li class="nav-item">
          <a class="nav-link" href="{{route('mst.mesjid.profilemesjid',$dataMesjid->ref)}}"
            ><i class="ti ti-lock ti-xs me-1"></i>Account</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('mst.mesjid.membermesjid',$dataMesjid->ref)}}"
            ><i class="ti ti-users ti-xs me-1"></i>Members</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('mst.mesjid.pinjamanmesjid',$dataMesjid->ref)}}"
            ><i class="ti ti-users ti-xs me-1"></i>Pinjaman</a
          >
        </li>
        
      </ul>
      <!--/ User Pills -->

      @include("mesjid.statisticmesjid")

      <!-- Activity Timeline -->
      <div class="card mb-4">
        <div class="card-header header-elements">
          <h5 class="card-header">Daftar Pinjaman</h5>
          <div class="card-header-elements ms-auto">
            <button type="button" class="btn btn-primary waves-effect waves-light" data-ref="" data-bs-target="#addPinjaman" data-bs-toggle="modal">
              <span class="tf-icon ti ti-plus me-1"></span>Add Pinjaman
            </button>
          </div>
        </div>
        <div class="card-body pb-0  card-datatable table-responsive">
          <table class="table table-data" id="dttable">
            <thead class="table-light">
              <tr>
                <th width="30%">Nama Usaha</th>
                <th>Pengajuan</th>
                <th>Diterima</th>
                <th>Status</th>
                <th width="10%">Lunas</th>
                <th>#</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- /Activity Timeline -->
 
    </div>
    <!--/ User Content -->
  </div>
</div>
@include('mesjid.addpinjaman')
@endsection
@section('page-script')
<script>

$table = $("#dttable").DataTable({
      processing: true,
      serverSide: true,
      "pageLength": 10,
      "columnDefs": [
                      { "targets": [1]},
                      { "targets": [0], "orderable": false }
                  ],
      ajax: {
          "url": "{{ route('mst.pinjaman.getdata',$dataMesjid->ref) }}",
          "data": function(d) {
              // d.form_search_values = $("#form-search").serializeArray();
          }
      },
      "aoColumns": [
        {
                "mData": "nama_usaha",
                "searchable": false,
                'class': ''
            },{
                "mData": "jumlah_pengajuan",
                "searchable": false,
                'class': ''
            },
            {
                "mData": "jumlah_disetujui",
                "searchable": false,
                'class': ''
            },
            {
              "mData": null,
                "orderable": false,
                "searchable": false,
                'sWidth': '150px',
                'class': 'text-left',
                "mRender": function(data, type, full) {
                  var actions = [];
                    actions.push("<span class='badge rounded-pill bg-label-"+full.color_status_pengajuan+"'>"+full.status_pengajuan+"</span>");
                    return actions.join('');
                }
            },{
              "mData": null,
                "orderable": false,
                "searchable": false,
                'sWidth': '150px',
                'class': 'text-left',
                "mRender": function(data, type, full) {
                  var actions = [];
                    actions.push("<span class='badge rounded-pill bg-label-"+full.color_status_lunas+"'>"+full.status_lunas+"</span>");
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
                    actions.push("<a data-toggle='tooltip' title='View' data-ref='"+full.ref+"' href='" + full.edit_url + "' data-bs-target='#addPinjaman' data-bs-toggle='modal' class='btn btn-sm btn-info'><i class='fa fa-eye'></i></a>");
                    actions.push("<a data-toggle='tooltip' title='Delete' link='" + full.delete_url + "' class='btn btn-sm btn-danger btn-delete'><i class='fa fa-trash'></i></a>");
                    actions.push("</div>");
                    return actions.join('');
                }
            }
        ]
  });

  jmlMember()
  function jmlMember(){
    var json_url = "{{ route('findjumlahmember',$dataMesjid->ref) }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlMember").html(data.jumlah);
      }
    });
  }
  jmlMemberPinjaman()
  function jmlMemberPinjaman(){
    var json_url = "{{ route('findjumlahpinjaman',$dataMesjid->ref) }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlPengajuanPinjaman").html(data.jumlah);
      }
    });
  }
  jmlPeminjam()
  function jmlPeminjam(){
    var json_url = "{{ route('findjumlahpeminjam',$dataMesjid->ref) }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlPeminjamAktif").html(data.jumlah);
      }
    });
  }
  jmlPinjamanBlmLunas()
  function jmlPinjamanBlmLunas(){
    var json_url = "{{ route('findSumjumlah',$dataMesjid->ref) }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlPinjamanBlmlunas").html(data.jumlah);
      }
    });
  }
loadMember();
function loadMember(){
  var json_url = "{{'/'}}"+"api/member/all/{{$dataMesjid->ref}}";
     $.getJSON(json_url,function(data){
         $("#ref_member").empty(); 
         if(data==""){
             $("#ref_member").append("<option value=\"\">Select</option>");
         }
         else{
             $("#ref_member").append("<option value=\"\">Select</option>");
             for(i=0; i<data.id.length; i++){
                 $("#ref_member").append("<option value=\"" + data.id[i]  + "\">" + data.text[i] +"</option>");
             }
         }
         
     });
     return false;
} 
$('#addPinjaman').on('hidden.bs.modal', function(event) {
  jmlPinjamanBlmLunas();
});
$('#addPinjaman').on('shown.bs.modal', function(event) {
  document.getElementById("frmPinjaman").reset();
  let reference_tag = $(event.relatedTarget); 
  let ref = reference_tag.data('ref');
  if(ref != ""){
    var json_url = "/getpinjaman/"+ref;
      $.getJSON(json_url,function(data){
        if(data.data != null){
          $("#ref").val(data.data.ref);
          $("#ref_member").val(data.data.ref_member);
          $("#jumlah_pengajuan").val(data.data.jumlah_pengajuan);
          $("#jumlah_disetujui").val(data.data.jumlah_disetujui);
          let status = data.data.status_persetujuan != null ? data.data.status_persetujuan : "1";
          $("#status_persetujuan").val(status);
          let statuslunas = data.data.status_lunas != null ? data.data.status_lunas : "";
          $("#status_lunas").val(statuslunas);
          $("#description").text(data.data.keterangan);
        }
      });
  }
})
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
                        jmlPinjamanBlmLunas();
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

</script>
@endsection