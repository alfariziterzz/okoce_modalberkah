
<!-- Modal -->
  <!-- Edit User Modal -->
  <div class="modal fade" id="addPinjaman" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Form Pinjaman</h3>
            {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
          </div>
          <form id="frmPinjaman" class="row g-3" method="POST" action="{{route('mst.pinjaman.save',$dataMesjid->ref)}}">
            @csrf
            <input type="hidden" id="ref" name="ref" class="form-control"/>
            <div class="col-md-12">
              <label class="form-label" for="multicol-country">Member</label>
              <select id="ref_member" name="ref_member" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                <option value="" data-select2-id="2">Select</option>
              </select>
            </div>
            <div class="col-12 c ol-md-12">
              <label class="form-label" for="nama">Jumlah Pinjaman</label>
              <input type="text" id="jumlah_pengajuan" name="jumlah_pengajuan" class="form-control"/>
            </div>
            <div class="col-12 c ol-md-12">
              <label class="form-label" for="nama">Jumlah Pinjaman Diterima</label>
              <input type="text" id="jumlah_disetujui" name="jumlah_disetujui" class="form-control"/>
            </div>
            <div class="col-md-12">
              <label class="form-label" for="multicol-country">Status</label>
              <select id="status_persetujuan" name="status_persetujuan" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                <option value="">Silahkan Pilih</option>
                <option value="1" data-select2-id="2">Menunggu Persetujuan</option>
                <option value="2" data-select2-id="2">Diterima</option>
                <option value="3" data-select2-id="2">Ditolak</option>
              </select>
            </div>
            <div class="col-md-12">
              <label class="form-label" for="multicol-country">Status Lunas</label>
              <select id="status_lunas" name="status_lunas" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                <option value="">Silahkan Pilih</option>
                <option value="1" data-select2-id="2">Lunas</option>
                <option value="2" data-select2-id="2">Belum Lunas</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label" for="address">Description</label>
              <textarea rows="5" class="form-control" id="description" name="description"></textarea>
            </div>
            
            <div class="col-12 text-center">
              <button type="submit" id="btnsave" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" id="btn-tutup" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!--/ Edit User Modal -->  
