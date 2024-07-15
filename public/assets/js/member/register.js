'use strict';
document.addEventListener('DOMContentLoaded', function (e) {
    (function () {
       
      // Edit user form validation
      FormValidation.formValidation(document.getElementById('frmRegister'), {
        fields: {
          // nama_usaha: {
          //   validators: {
          //     notEmpty: {
          //       message: 'Silahkan isi nama'
          //     }
          //   }
          // },
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
    let action_form_document = $('#frmRegister').attr('action');
		let the_data = new FormData(document.getElementById("frmRegister"));
		 $.ajax({    
		 	type: "POST",
			url: action_form_document,
			data: the_data,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            dataType: 'JSON',
            success: function(data){ 
              if(data.success){
                  toastr.success("Berhasil mendaftar member");
                  Swal.fire({
                      text: "Berhasil",
                      icon: "success",
                      buttonsStyling: false,
                      confirmButtonText: "Ok, Terimakasih!",
                      customClass: {
                          confirmButton: "btn btn-primary"
                      }
                  }).then(function() {
                    window.location.href = data.url;
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
                // toastr.error("Error");
                Swal.fire({
                    text: "Maaf, Ada kesalahan "+json.message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, Saya perbaiki!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                let messageValidation = "";
                Object.keys(json.errors).forEach(key => {
                  console.log(json.errors[key])
                  messageValidation = messageValidation + json.errors[key]+"<br>";
                  
                })
                toastr.error(messageValidation);
            },
        });
		return false; 
	}
