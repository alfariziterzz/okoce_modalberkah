<div class="card mb-4">
  <div class="card h-100">
    <div class="card-header">
      <div class="d-flex justify-content-between mb-3">
        <h5 class="card-title mb-0">Statistics</h5>
        <small class="text-muted">Real Time</small>
      </div>
    </div>
    <div class="card-body">
      <div class="row gy-2">
        <div class="col-md-2 col-6">
          <div class="d-flex align-items-center">
            <div class="badge rounded-pill bg-label-info me-3 p-2">
              <i class="ti ti-home ti-sm"></i>
            </div>
            <div class="card-info">
              <a href="{{route('mst.mesjid.view')}}"><h5 class="mb-0" id="jmlMesjid">asd</h5></a>
              <small>Mesjid</small>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-6">
          <div class="d-flex align-items-center">
            <div class="badge rounded-pill bg-label-info me-3 p-2">
              <i class="ti ti-users ti-sm"></i>
            </div>
            <div class="card-info">
              <a href="{{route('mst.member')}}"><h5 class="mb-0" id="jmlMember"></h5></a>
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
              <a href="{{route('mst.pinjaman')}}"><h5 class="mb-0" id="jmlPengajuanPinjaman"></h5></a>
              <small>Pengajuan Pinjaman</small>
            </div>
          </div>
        </div>
        
        <div class="col-md-2 col-6">
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