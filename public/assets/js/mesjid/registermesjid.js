'use strict';
document.addEventListener('DOMContentLoaded', function (e) {
    (function () {
       
      // Edit user form validation
      FormValidation.formValidation(document.getElementById('frmMesjid'), {
        fields: {
          nama: {
            validators: {
              notEmpty: {
                message: 'Silahkan isi nama mesjid'
              }
            }
          },
          alamat: {
            validators: {
              notEmpty: {
                message: 'Silahkan masukan alamat'
              }
            }
          },
          email: {
            validators: {
              notEmpty: {
                message: 'Silahkan masukan email'
              }
            }
          },
          
          slckabupaten: {
            validators: {
              notEmpty: {
                message: 'Silahkan masukan Kabupaten'
              }
            }
          },
          nama_1: {
            validators: {
              notEmpty: {
                message: 'Silahkan masukan Pengurus 1'
              }
            }
          },
          nama_4: {
            validators: {
              notEmpty: {
                message: 'Silahkan masukan PIC'
              }
            }
          },
          
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
    let action_form_document = $('#frmMesjid').attr('action');
		let the_data = new FormData(document.getElementById("frmMesjid"));
		 $.ajax({    
		 	type: "POST",
			url: action_form_document,
			data: the_data,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            dataType: 'JSON',
            success: function(data){ 
              if(data.success){
                  toastr.success("Mesjid added succesfully");
                  Swal.fire({
                      text: "Berhasil",
                      icon: "success",
                      buttonsStyling: false,
                      confirmButtonText: "Ok, Terimakasih!",
                      customClass: {
                          confirmButton: "btn btn-primary"
                      }
                  }).then(function() {
                    document.getElementById("frmMesjid").reset();
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
                let messageValidation = "";
                Object.keys(json.errors).forEach(key => {
                  messageValidation = messageValidation + json.errors[key]+"<br>";
                  
                })
                toastr.error(messageValidation);
            },
        });
		return false; 
	}
