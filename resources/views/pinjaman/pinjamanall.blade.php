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
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View /</span> Pinjaman</h4>
  <div class="row">
    <!-- User Content -->
    <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">
        <!-- Project table -->
        @include("content.pages.statistic")
    </div>
    <!--/ User Content -->
  </div>
    <!-- User Content -->
    <div class="col-xl-12 col-lg-12 col-md-7 order-0 order-md-1">       
      <!-- Activity Timeline -->
      <div class="card mb-4">
        <h5 class="card-header">Daftar Pinjaman</h5>
        <div class="card-body pb-0">
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
          "url": "{{ route('pinjaman.getdataall') }}",
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
  jmlMesjid()
  function jmlMesjid(){
    var json_url = "{{ route('findjumlahmesjidall') }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlMesjid").html(data.jumlah);
      }
    });
  }
  jmlMember()
  function jmlMember(){
    var json_url = "{{ route('findjumlahmemberall') }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlMember").html(data.jumlah);
      }
    });
  }
  jmlMemberPinjaman()
  function jmlMemberPinjaman(){
    var json_url = "{{ route('findjumlahpinjamanall') }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlPengajuanPinjaman").html(data.jumlah);
      }
    });
  }
  jmlPeminjam()
  function jmlPeminjam(){
    var json_url = "{{ route('findjumlahpeminjamall') }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlPeminjamAktif").html(data.jumlah);
      }
    });
  }
  jmlPinjamanBlmLunas()
  function jmlPinjamanBlmLunas(){
    var json_url = "{{ route('findSumjumlahall') }}";
    $.getJSON(json_url,function(data){
      if(data.jumlah != null){
        $("#jmlPinjamanBlmlunas").html(data.jumlah);
      }
    });
  }
</script>
@endsection