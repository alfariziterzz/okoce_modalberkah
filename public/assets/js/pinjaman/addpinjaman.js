'use strict';
document.addEventListener('DOMContentLoaded', function (e) {
    (function () {
       
      // Edit user form validation
      FormValidation.formValidation(document.getElementById('frmPinjaman'), {
        fields: {
          jumlah_pinjaman: {
            validators: {
              notEmpty: {
                message: 'Silahkan isi Jumlah pinjaman'
              }
            }
          },
          // email_member: {
          //     validators: {
          //         notEmpty: {
          //           message: 'Silahkan masukan email'
          //         }
          //     }
          // },
          // nama_pemilik: {
          //   validators: {
          //     notEmpty: {
          //       message: 'Silahkan masukan Nama Pemilik usaha'
          //     }
          //   }
          // },
          // username: {
          //   validators: {
          //     notEmpty: {
          //       message: 'Silahkan masukan username'
          //     }
          //   }
          // },
          // password: {
          //   validators: {
          //     notEmpty: {
          //       message: 'Silahkan masukan password'
          //     }
          //   }
          // },
          // confirm_password: {
          //   validators: {
          //     notEmpty: {
          //       message: 'Silahkan masukan confirm password'
          //     }
          //   }
          // },
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: '.col-12'
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),
          // Submit the form when all fields are valid
          // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        }
      }).on('core.form.valid', function () {
        submitData();
      });
    })();
  });
  function submitData(){
    let action_form_document = $('#frmPinjaman').attr('action');
		let the_data = new FormData(document.getElementById("frmPinjaman"));
		 $.ajax({    
		 	type: "POST",
			url: action_form_document,
			data: the_data,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            dataType: 'JSON',
            success: function(data){ 
              if(data.success){
                  toastr.success(data.message);
                  Swal.fire({
                      text: "Berhasil",
                      icon: "success",
                      buttonsStyling: false,
                      confirmButtonText: "Ok, Terimakasih!",
                      customClass: {
                          confirmButton: "btn btn-primary"
                      }
                  }).then(function() {
                    $table.ajax.reload(null,true);
                    $(".modal-body #btn-tutup").click();
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
                  toastr.error("Error");
              }
              $table.ajax.reload(null,true);
            },
            error: function (jqXHR, textStatus, errorMessage) {
              let json = JSON.parse(jqXHR.responseText);
                toastr.error("Error");
                Swal.fire({
                    text: "Maaf, Ada kesalahan "+json.message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, Saya perbaiki!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                let msg = JSON.stringify(json.errors);
                // console.log(json.errors.auth_username);
                toastr.error(msg);
            },
        });
		return false; 
	}
