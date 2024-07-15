<script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyByPx-qhpqoLp8tfelpEppFIedOvu2h8aM&callback=initMap" type="text/javascript"></script>
<!-- Project table -->
<div class="card mb-4">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
          <h5 class="card-title mb-0">Statistics</h5>
          <small class="text-muted">Real Time</small>
        </div>
      </div>
      <div class="card-body">
        <div class="row gy-3">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-info me-3 p-2">
                <i class="ti ti-users ti-sm"></i>
              </div>
              <div class="card-info">
                <a href="{{route('mst.mesjid.membermesjid',$dataMesjid->ref)}}"><h5 class="mb-0" id="jmlMember"></h5></a>
                <small>Members</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-primary me-3 p-2">
                <i class="ti ti-chart-pie-2 ti-sm"></i>
              </div>
              <div class="card-info">
                <a href="{{route('mst.mesjid.pinjamanmesjid',$dataMesjid->ref)}}"><h5 class="mb-0" id="jmlPengajuanPinjaman"></h5></a>
                <small>Pengajuan Pinjaman</small>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-danger me-3 p-2">
                <i class="ti ti-user ti-sm"></i>
              </div>
              <div class="card-info">
                <h5 class="mb-0" id="jmlPeminjamAktif"></h5>
                <small>Peminjam Aktif</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-success me-3 p-2">
                <i class="ti ti-currency-dollar ti-sm"></i>
              </div>
              <div class="card-info">
                <h5 class="mb-0" id="jmlPinjamanBlmlunas"></h5>
                <small>Pinjaman blm lunas</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /Project table -->
<script>
var peta;
var jenis = ""; 
var tanda = ""; 
var gambar_tanda="";
var defaultlat = "{{$dataMesjid->latitude}}";
var defaultlong = "{{$dataMesjid->longitude}}";
function initMap() {
  var jakarta = new google.maps.LatLng(defaultlat,defaultlong);
  var petaoption = {
  zoom: 5,
  center: jakarta
  };
  peta = new google.maps.Map(document.getElementById("map"),petaoption);
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
    // tanda.setMap(null);
    set_icon(jenis);
    tanda = new google.maps.Marker({
      position: lokasi,
      map: peta,
      icon: gambar_tanda
  });
}
function set_icon(jenis){
  switch(jenis){
    case "company":
      gambar_tanda = 'icon/point.png';
  }
}
initMap();
</script>
    