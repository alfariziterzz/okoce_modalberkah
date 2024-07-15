@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/layoutMaster')
@section('title', "Dashboard")
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
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/js/pinjaman/addpinjaman.js')}}"></script>
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile / View /</span> Dashboard</h4>
  <div class="row">
    <!-- User Content -->
    <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">
        <!-- Project table -->
        @include("content.pages.statistic")
    </div>
    <!--/ User Content -->
  </div>
</div>
@endsection
@section('page-script')
<script>
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