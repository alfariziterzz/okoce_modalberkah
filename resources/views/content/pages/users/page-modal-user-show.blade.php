<!-- Modal -->
  <!-- Edit User Modal -->
  <div class="modal fade" id="showDetailUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">View User</h3>
            {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
          </div>
          <form id="showUserForm" class="row g-3" method="POST" action="">
            <div class="col-12 col-md-6">
              <label class="form-label" for="first_name_view">First Name</label>
              <input
                type="text"
                id="first_name_view"
                name="first_name_view"
                class="form-control"
                placeholder="John" disabled/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="last_name_view">Last Name</label>
              <input
                type="text"
                id="last_name_view"
                name="last_name_view"
                class="form-control"
                placeholder="Doe" disabled/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="username_view">Username</label>
              <input
                type="text"
                id="username_view"
                name="username_view"
                class="form-control"
                placeholder="Jika Kosong akan disamakan dengan Email" disabled/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Phone Number</label>
              <div class="input-group">
                <span class="input-group-text">ID (+62)</span>
                <input
                  type="text"
                  id="phone_view"
                  name="phone_view"
                  class="form-control phone-number-mask"
                  placeholder="85712341234" disabled/>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Email</label>
              <input
                type="text"
                id="email_view"
                name="email_view"
                class="form-control"
                placeholder="example@domain.com" disabled/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="email_external">Email Eksternal</label>
              <input
                type="text"
                id="email_external_view"
                name="email_external_view"
                class="form-control"
                placeholder="example@domain.com" disabled/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="simpeg_id">Status</label>
              <div id='is_active_view'></div>
            </div>
            <div class="col-12 text-center">
              <button
                type="reset"
                class="btn btn-label-secondary"
                data-bs-dismiss="modal"
                aria-label="Close">
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Edit User Modal -->
