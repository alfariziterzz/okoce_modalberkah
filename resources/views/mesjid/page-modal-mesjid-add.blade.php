<!-- Modal -->
  <!-- Edit User Modal -->
  <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Form Mesjid</h3>
            {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
          </div>
          <form id="frmMesjid" class="row g-3" method="POST" action="{{route('mst.mesjid.store')}}">
            @csrf
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
                <input type="file" class="form-control" id="files" name="files" required />
              </div>
            </div>
            <div class="col-12 col-md-1 divlampiranview">
              <div class="input-group">
                <a href="" target="_blank" class="lampiranview"><span class="input-group-text btn-primary"><i class="ti ti-file"></i></span></a>
              </div>
            </div>
            <div class="form-check form-switch mb-12 col-6">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active">
              <label class="form-check-label" for="flexSwitchCheckChecked">Active?</label>
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
          </form>
        </div>
      </div>
    </div>
  </div>
<!--/ Edit User Modal -->

