var tablepetugas;
var tablekelas;

$.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    }
  });

  $.validator.addMethod('lettersonly', function(value, element) {
      return this.optional(element) || /^[a-zA-Z'.,\s]+$/i.test(value);
  }, 'Hanya boleh huruf saja.');

  $.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element)
      || value.length >= 6
      && /\d/.test(value)
      && /[a-z]/i.test(value);
  }, 'Password minimal harus 6 huruf, 1 angka dan 1 karakter.')

  $.validator.addMethod('noSpace', function(value, element) {
    return this.optional(element)
    || value.indexOf(" ") < 0
    && value != "";
  }, 'Tidak boleh mengandung spasi.')

$(document).ready(function() {
    tablepetugas = $("#tablepetugas").DataTable( {
          "pageLength": 7,
          "lengthChange": false,
          "language": {
              "url": "../assets/json/Indonesian.json"
          },
          "ajax": {
            "url": "../admin/query/read_datapetugas.php",
            "type": "POST"
          },
          "columns": [
          { "data": "no" },
          { "data": "nip" },
          { "data": "nama" },
          { "data": "username" },
          { "data": "hak_akses" },
          { "data": "status_petugas" },
          { "data": "btnaksi" },
        ]
    });

    tablekelas = $("#tablekelas").DataTable( {
          "pageLength": 7,
          "lengthChange": false,
          "language": {
              "url": "../assets/json/Indonesian.json"
          },
          "ajax": {
            "url": "../admin/query/read_datakelas.php",
            "type": "POST"
          },
          "columns": [
          { "data": "no" },
          { "data": "kelas" },
          { "data": "status_kelas" },
          { "data": "btnaksi" },
        ]
    });

    $("#btntbhpetugas").on('click', function(){
    $("#formtbhpetugas")[0].reset();
    $(".form-group").removeClass('has-error');
    $(".help-block").empty();
      $("#formtbhpetugas").validate({
        rules: {
          nip: {
            required: true,
            number: true,
            maxlength: 18,
            noSpace: true,
            remote: '../admin/query/cek_nip.php'
          },
          nama: {
            required: true,
            lettersonly: true
          },
          username: {
            required: true,
            minlength: 6,
            noSpace: true,
            remote: "../admin/query/cek_username.php"
          },
          password: {
            required: true,
            maxlength: 50,
            strongPassword: true
          },
          status_petugas: {
            required: true
          },
          hak_akses: {
            required: true
          }
        },
        messages: {
          nip: {
            required: 'Silahkan isi NIP terlebih dahulu.',
            number: 'Hanya boleh angka saja.',
            maxlength: 'NIS tidak boleh lebih dari 18 angka',
            noSpace: 'Tidak boleh mengandung spasi.',
            remote: 'NIP sudah terdaftar.'
          },
          nama: {
            required: 'Silahkan isi nama terlebih dahulu.'
          },
          username: {
            required: 'Silahkan isi username terlebih dahulu.',
            minlength: 'Minimal 6 karakter.',
            remote: 'Username sudah digunakan.'
          },
          password: {
            required: 'Silahkan isi password terlebih dahulu.',
            maxlength: 'Maksimal password 50 karakter'
          },
          status_petugas: {
            required: 'Silahkan isi status terlebih dahulu.'
          },
          hak_akses: {
            required: 'Silahkan pilih hak akses terlebih dahulu.'
          }
        },
        submitHandler: function (form) {
                var form = $(form);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'json',
                    success:function(response){
                      if (response.success == true) {
                        $("#formtbhpetugas")[0].reset();
                        toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                        tablepetugas.ajax.reload(null, false);
                        $("#modaltbhpetugas").modal('hide');
                      } else {
                        $("#formtbhpetugas")[0].reset();
                        toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                        $("#modaltbhpetugas").modal('hide');
                      }                
                    }
                });
                return false;
            }
      });
    });



      $("#btntbhkelas").on('click', function(){
      $("#formtbhkelas")[0].reset();
      $(".form-group").removeClass('has-error');
      $(".help-block").empty();
        $("#formtbhkelas").validate({
          rules: {
            tingkat: {
              required: true
            },
            jurusan: {
              required: true
            },
            ruangan: {
              required: true
            },
            status_kelas: {
              required: true
            }
          },
          messages: {
            tingkat: {
              required: 'Silahkan isi tingkat terlebih dahulu.'
            },
            jurusan: {
              required: 'Silahkan isi jurusan terlebih dahulu.'
            },
            ruangan: {
              required: 'Silahkan isi ruangan terlebih dahulu.'
            },
            status_kelas: {
              required: 'Silahkan isi status terlebih dahulu.'
            }
          },
          submitHandler: function (form) {
                  var form = $(form);
                  $.ajax({
                      url: form.attr('action'),
                      type: form.attr('method'),
                      data: form.serialize(),
                      dataType: 'json',
                      success:function(response){
                        if (response.success == true) {
                          $("#formtbhkelas")[0].reset();
                          toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                          tablekelas.ajax.reload(null, false);
                          $("#modaltbhkelas").modal('hide');
                        } else {
                          $("#formtbhkelas")[0].reset();
                          toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                          $("#modaltbhkelas").modal('hide');
                        }                
                      }
                  });
                  return false;
              }
        });
      });

    $("#formeditpassword").validate({
      rules: {
        password: {
          required: true,
          maxlength: 50,
          strongPassword: true
        },
        konfirmasi_password: {
          required: true,
          equalTo: "#password"
        }
      },
      messages: {
        password: {
          required: "Silahkan isi password terlebih dahulu.",
          maxlength: "Maksimal password 50 karakter"
        },
        konfirmasi_password: {
          required: "Silahkan isi password terlebih dahulu.",
          equalTo: "Password tidak sesuai."
        },
      },
      submitHandler: function(form){
        var form = $(form);
        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: form.serialize(),
          dataType: 'json',
          success:function(response){
            if (response.success == true) {
              $("#formeditpassword")[0].reset();
              toastr.success(response.messages, 'Sukses', {timeOut: 5000})
            } else {
              $("#formeditpassword")[0].reset();
              toastr.error(response.messages, 'Gagal', {timeOut: 5000})
            }
          }
        });
        return false;
      }
    });

});


function hpspetugas(id_petugas) {
  if (id_petugas) {
    $("#btnhpspetugas").unbind('click').bind('click', function() {
        $.ajax({
          url: '../admin/query/delete_datapetugas.php',
          type: 'POST',
          data: {id_petugas:id_petugas},
          dataType: 'json',
          success:function(response) {
            if (response.success == true) {
                toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                tablepetugas.ajax.reload(null, false);
                $("#modalhpspetugas").modal('hide');
            } else {
                toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                $("#modalhpspetugas").modal('hide');
            }
          }
        });
    });
  }
} 

function hpskelas(id_kelas) {
  if (id_kelas) {
    $("#btnhpskelas").unbind('click').bind('click', function() {
        $.ajax({
          url: '../admin/query/delete_datakelas.php',
          type: 'POST',
          data: {id_kelas:id_kelas},
          dataType: 'json',
          success:function(response) {
            if (response.success == true) {
                toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                tablekelas.ajax.reload(null, false);
                $("#modalhpskelas").modal('hide');
            } else {
                toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                $("#modalhpskelas").modal('hide');
            }
          }
        });
    });
  }
}  

function editpetugas(id_petugas){
  if (id_petugas) {
    $("#id_petugas").remove();
    $("#username2").remove();
    $("#password2").remove();
    $.ajax({
      url: '../admin/query/getid_petugas.php',
      type: 'POST',
      data: {id_petugas:id_petugas},
      dataType: 'json',
      success:function(response) {
        $("#editpetugas").append('<input type="hidden" name="id_petugas" class="form-control" id="id_petugas" value="'+response.id_petugas+'"/>');
        $("#editnip").val(response.nip);
        $("#editnama").val(response.nama);
        $("#editusername").val("");
        $("#editusername1").append('<p id="username2">Username saat ini : '+response.username+'</p>');
        $("#editpassword").val("");
        $("#editpassword1").append('<p id="password2">Kosongkan jika tidak ada perubahan</p>');
        $("#editstatus_petugas").val(response.status_petugas);
        $("#edithak_akses").val(response.hak_akses);
        $("#formeditpetugas").validate({  
            rules: {
              editnama: {
                required: true,
                lettersonly: true
              },
              editusername: {
                minlength: 6,
                noSpace: true,
                remote: {
                  url: "../admin/query/cek_editusername.php",
                  type: "post",
                  data: {
                    username: function() {
                      return $("#editusername").val();
                    }
                  }
                }  
              },
              editpassword: {
                strongPassword: true
              },
              editstatus_petugas: {
                required: true
              },
              edithak_akses: {
                required: true
              }
            },
            messages: {
              editnama: {
                required: 'Silahkan isi nama terlebih dahulu.'
              },
              editusername: {
                minlength: 'Minimal 6 karakter.',
                remote: 'Username sudah digunakan.'
              },
              editstatus_petugas: {
                required: 'Silahkan pilih status terlebih dahulu.'
              },
              edithak_akses: {
                required: 'Silahkan pilih hak akses terlebih dahulu.'
              }
            },
            submitHandler: function (form) {         
              var form = $(form);
              $.ajax({
                  url: form.attr('action'),
                  type: form.attr('method'),
                  data: form.serialize(),
                  dataType: 'json',
                  success:function(response){
                    if (response.success == true) {
                      toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                      tablepetugas.ajax.reload(null, false);
                      $("#modaleditpetugas").modal('hide');
                    } else {
                      toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                      $("#modaleditpetugas").modal('hide');
                    }                
                  }
              });
              return false;
            }
        });
      }
    });
  }
} 

function editkelas(id_kelas){
  if (id_kelas) {
    $("#id_kelas").remove();
    $.ajax({
      url: '../admin/query/getid_kelas.php',
      type: 'POST',
      data: {id_kelas:id_kelas},
      dataType: 'json',
      success:function(response) {
        $("#editkelas").append('<input type="hidden" name="id_kelas" class="form-control" id="id_kelas" value="'+response.id_kelas+'"/>');
        $("#edittingkat").val(response.tingkat);
        $("#editjurusan").val(response.jurusan);
        $("#editruangan").val(response.ruangan);
        $("#editstatus_kelas").val(response.status_kelas);
        $("#formeditkelas").validate({  
          rules: {
            edittingkat: {
              required: true
            },
            editjurusan: {
              required: true
            },
            editruangan: {
              required: true
            },
            editstatus_kelas: {
              required: true
            }
          },
          messages: {
            edittingkat: {
              required: 'Silahkan isi tingkat terlebih dahulu.'
            },
            editjurusan: {
              required: 'Silahkan isi jurusan terlebih dahulu.'
            },
            editruangan: {
              required: 'Silahkan isi ruangan terlebih dahulu.'
            },
            editstatus_kelas: {
              required: 'Silahkan isi status terlebih dahulu.'
            }
          },
            submitHandler: function (form) {         
              var form = $(form);
              $.ajax({
                  url: form.attr('action'),
                  type: form.attr('method'),
                  data: form.serialize(),
                  dataType: 'json',
                  success:function(response){
                    if (response.success == true) {
                      toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                      tablekelas.ajax.reload(null, false);
                      $("#modaleditkelas").modal('hide');
                    } else {
                      toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                      $("#modaleditkelas").modal('hide');
                    }                
                  }
              });
              return false;
            }
        });
      }
    });
  }
} 

function btnreset() {
  $(".form-group").removeClass('has-error');
  $(".help-block").empty();
}

