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
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/clipboard/clipboard.js')}}"></script>
<script src="{{asset('assets/js/extended-ui-misc-clipboardjs.js')}}"></script>
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
          <a class="nav-link" href="{{route('mst.mesjid.profile')}}"
            ><i class="ti ti-lock ti-xs me-1"></i>Account</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('mst.mesjid.member')}}"
            ><i class="ti ti-users ti-xs me-1"></i>Members</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('mst.mesjid.pinjaman')}}"
            ><i class="ti ti-users ti-xs me-1"></i>Pinjaman</a
          >
        </li>
        
      </ul>
      <!--/ User Pills -->

      @include("mesjid.statistic")

      <!-- Activity Timeline -->
      <div class="card mb-4">
        <h5 class="card-header">Daftar Member</h5>
        <div class="card-body pb-0">
          <table class="table table-data" id="dttable">
            <thead class="table-light">
              <tr>
                <th>Nama</th>
                <th>Keterangan</th>
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
@include('mesjid.page-modal-mesjid-add')
@endsection
@section('page-script')
<script>


$table = $("#dttable").DataTable({
      processing: true,
      serverSide: true,
      "pageLength": 10,
      "columnDefs": [
                      { "targets": [1]},
                      { "targets": [0], "orderable": true }
                  ],
      ajax: {
          "url": "{{ route('mst.member.getdata',$dataMesjid->ref) }}",
          "data": function(d) {
              // d.form_search_values = $("#form-search").serializeArray();
          }
      },
      "aoColumns": [
            {
                "mData": "nama_usaha",
                "searchable": true,
                'class': ''
            },
            {
                "mData": "nama_pemilik",
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
                    actions.push("<div class='btn-group'>");
                    actions.push("<a data-toggle='tooltip' title='View' data-ref='"+full.ref+"' href='" + full.edit_url + "' data-bs-target='#addmember' data-bs-toggle='modal' class='btn btn-sm btn-info'><i class='fa fa-eye'></i></a>");

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
</script>
@endsection