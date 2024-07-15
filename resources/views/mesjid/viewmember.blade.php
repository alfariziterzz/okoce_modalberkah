
<!-- Modal -->
  <!-- Edit User Modal -->
  <div class="modal fade" id="viewMember" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Form Member</h3>
            {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
          </div>
          <form id="frmRegister" class="card-body" method="POST" action="{{route('mst.member.store')}}">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="multicol-first-name">Nama Usaha</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname" class="input-group-text"><i class="ti ti-building"></i></span>
                  <input type="text" id="nama_usaha" name="nama_usaha" class="form-control" placeholder="PT." aria-label="PT." aria-describedby="basic-icon-default-company2">
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-nama_pemilik">Nama Pemilik Usaha</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-user"></i></span>
                  <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" placeholder="" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
                </div>
              </div>
              <div class="col-md-12">
                <label class="form-label" for="multicol-country">Jenis Usaha</label>
                <select id="jenis_usaha" name="jenis_usaha" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                  <option value="" data-select2-id="2">Select</option>
                </select>
              </div>
              <div class="mb-12">
                <label class="form-label" for="basic-default-message">Alamat</label>
                <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control" placeholder=""></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-provinsi">Provinsi</label>
                <select id="provinsi" name="provinsi" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                  <option value="" data-select2-id="2">Select</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-email">Kabupaten</label>
                <div class="input-group input-group-merge">
                  <select id="slckabupaten" name="kabupaten" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="2">Select</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-kecamatan">Kecamatan</label>
                <select id="kecamatan" name="kecamatan" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                  <option value="" data-select2-id="2">Select</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-kelurahan">Kelurahan</label>
                <div class="input-group input-group-merge">
                  <select  id="kelurahan" name="kelurahan" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="2">Select</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-rt">RT</label>
                <input type="text" id="rt" name="rt" class="form-control" placeholder="">
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-rw">RW</label>
                <div class="input-group input-group-merge">
                  <input type="text" id="rw" name="rw" class="form-control" placeholder="" aria-label="john.doe" aria-describedby="multicol-email2">
                </div>
              </div>
              <div class="col-md-12">
                <label class="form-label" for="multicol-country">Status Tempat Usaha</label>
                <select id="status_tempat" name="status_tempat" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                  <option value="" data-select2-id="2">Select</option>
                  <option value="1">Milik Keluarga</option>
                  <option value="2">Milik Sendiri</option>
                  <option value="3">Sewa</option>
                </select>
              </div>
              <div class="col-md-12">
                <label class="form-label" for="multicol-country">Legalitas Badan Usaha</label>
                <select id="badan_usaha" name="badan_usaha" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                  <option value="" data-select2-id="2">Select</option>
                  <option value="1">Sudah Memiliki</option>
                  <option value="2">Belum Memiliki</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-country">NPWP dan Pelaporan</label>
                <div class="col mt-2">
                  <div class="form-check form-check-inline">
                    <input name="npwp_pelaporan" class="form-check-input" type="radio" value="1" id="collapsible-address-type-home">
                    <label class="form-check-label" for="collapsible-address-type-home">Sudah Punya</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="npwp_pelaporan" class="form-check-input" type="radio" value="0">
                    <label class="form-check-label" for="collapsible-address-type-office">
                      Belum Punya
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-country">Laporan Keuangan</label>
                <div class="col mt-2">
                  <div class="form-check form-check-inline">
                    <input name="laporan_keuangan" class="form-check-input" type="radio" value="1">
                    <label class="form-check-label" for="collapsible-address-type-home">Sudah Punya</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="laporan_keuangan" class="form-check-input" type="radio" value="0">
                    <label class="form-check-label" for="collapsible-address-type-office">
                      Belum Punya
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
              </div>
              <div class="col-md-6">
                <div class="form-check">
                  <input class="form-check-input" name="laporan_laba_rugi" type="checkbox" value="1">
                  <label class="form-check-label" for="deliveryAdd">
                    Laporan Laba-rugi
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="laporan_neraca" type="checkbox" value="1">
                  <label class="form-check-label" for="deliveryAdd">
                    Laporan Neraca
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="laporan_arus_kas" type="checkbox" value="">
                  <label class="form-check-label" for="deliveryAdd">
                    Laporan Arus Kas
                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <label class="form-label" for="multicol-country">Akses Pemodalan</label>
                <div class="col mt-2">
                  <div class="form-check form-check-inline">
                    <input name="akses_permodalan" class="form-check-input" type="radio" value="1">
                    <label class="form-check-label" for="collapsible-address-type-home">Sudah Punya</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="akses_permodalan" class="form-check-input" type="radio" value="0">
                    <label class="form-check-label" for="collapsible-address-type-office">
                      Belum Punya
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-birthdate">Mulai Beroperasi</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                  <input type="text" id="mulai_beroperasi" name="mulai_beroperasi" class="form-control dob-picker flatpickr-input" readonly="readonly">
                </div>
                
              </div>
              <div class="col-md-6">
                <label class="form-label" for="multicol-phone">Phone No</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-phone"></i></span>
                  <input type="text" id="no_ponsel" name="no_ponsel" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                </div>
              </div>
            </div>
             
          </form>
        </div>
      </div>
    </div>
  </div>
<!--/ Edit User Modal -->  
