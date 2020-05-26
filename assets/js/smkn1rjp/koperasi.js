var tablebarang;

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
      return this.optional(element) || /^[a-zA-Z'\s]+$/i.test(value);
    }, 'Hanya boleh huruf saja.');

  $.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element)
      || value.length >= 6
      && /\d/.test(value)
      && /[a-z]/i.test(value);
  }, 'Password minimal harus 6 huruf, 1 angka dan 1 karakter.');

  $.validator.addMethod('noSpace', function(value, element) {
    return this.optional(element)
    || value.indexOf(" ") < 0
    && value != "";
  }, 'Tidak boleh mengandung spasi.');

  $.fn.datepicker.dates['id'] = {
    days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
    daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
    daysMin: ["Mg", "Sn", "Sl", "Rb", "Km", "Jm", "Sb"],
    months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
    today: "Hari ini",
    weekStart: 0
};

/*$.validator.addMethod("stokmax",
function (value, element, param) {
  var $min = $(param);
  if (this.settings.onfocusout) {
    $min.off(".validate-stokmax").on("blur.validate-stokmax", function () {
      $(element).valid();
    });
  }
  return parseInt(value) <= parseInt($min.val());
}, "Stok tidak mencukupi");*/

$(document).ready(function() {
  $("#jumlah").maskMoney({prefix:"Rp. ",thousands:".", precision:0});

  $("#tgl_awal, #tgl_akhir").datepicker({  
    format: "yyyy-mm-dd",
    language: "id", 
    autoclose: true
  });

    tablebarang = $("#tablebarang").DataTable( {
          "pageLength": 7,
          "lengthChange": false,
          "language": {
              "url": "../assets/json/Indonesian.json"
          },
          "ajax": {
            "url": "../koperasi/query/read_databarang.php",
            "type": "POST"
          },
          "columns": [
          { "data": "no" },
          { "data": "nmbarang" },
          { "data": "hrgbarang" },
          { "data": "stok" },
          { "data": "status_barang" },
          { "data": "btnaksi" },
        ]
    } );

    tablesiswa = $("#tablesiswa").DataTable( {
          "pageLength": 7,
          "lengthChange": false,
          "language": {
              "url": "../assets/json/Indonesian.json"
          },
          "ajax": {
            "url": "../koperasi/query/read_datasiswa.php",
            "type": "POST"
          },
          "columns": [
          { "data": "no" },
          { "data": "nis" },
          { "data": "nama" },
          { "data": "kelas" },
          { "data": "status_siswa" },
          { "data": "btnaksi" },
        ]
    } );

    var tablesaldo = $("#tablesaldo").DataTable( {
          "pageLength": 7,
          "lengthChange": false,
          "language": {
              "url": "../assets/json/Indonesian.json"
          },
          "ajax": {
            "url": "../koperasi/query/read_datasaldo.php",
            "type": "POST"
          },
          "columns": [
          { "data": "no" },
          { "data": "tgl_transaksi" },
          { "data": "nis" },
          { "data": "nama" },
          { "data": "nominal" },
          { "data": "jtransaksi" },
        ]
    } );

    var tablebelanja = $("#tablebelanja").DataTable( {
          "pageLength": 7,
          "lengthChange": false,
          "language": {
              "url": "../assets/json/Indonesian.json"
          },
          "ajax": {
            "url": "../koperasi/query/read_databelanja.php",
            "type": "POST"
          },
          "columns": [
          { "data": "no" },
          { "data": "tgl_pembelian" },
          { "data": "no_order" },
          { "data": "nama" },
          { "data": "jumlah" },
          { "data": "btnaksi" },
        ]
    });

    $("#btntbhbarang").on('click', function(){
    $("#formtbhbarang")[0].reset();
    $(".form-group").removeClass('has-error');
    $(".help-block").empty();
      $("#formtbhbarang").validate({
        rules: {
          nmbarang: {
            required: true
          },
          hrgbarang: {
            required: true
          },
          stokbarang: {
            required: true,
            number: true
          },
          status_barang: {
            required: true
          }
        },
        messages: {
          nmbarang: {
            required: 'Silahkan isi nama barang terlebih dahulu.'
          },
          hrgbarang: {
            required: 'Silahkan isi harga barang terlebih dahulu.'
          },
          stokbarang: {
            required: 'Silahkan isi stok barang terlebih dahulu.'
          },
          status_barang: {
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
                        $("#formtbhbarang")[0].reset();
                        toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                        tablebarang.ajax.reload(null, false);
                        $("#modaltbhbarang").modal('hide');
                      } else {
                        $("#formtbhbarang")[0].reset();
                        toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                        $("#modaltbhbarang").modal('hide');
                      }                
                    }
                });
                return false;
            }
      });
    });

  $("#btntbhsiswa").on('click', function(){
    $("#formtbhsiswa")[0].reset();
    $(".form-group").removeClass('has-error');
    $(".help-block").empty();
    $("#formtbhsiswa").validate({
        rules: {
            uid: {
              required: true,
              remote: '../koperasi/query/cek_uid.php'
            },
            nis: {
              required: true,
              number: true,
              maxlength: 9,
              noSpace: true,
              remote: '../koperasi/query/cek_nis.php'
            },
            nama: {
              required: true,
              lettersonly: true
            },
            nohp: {
              required: true,
              number: true,
              noSpace: true,
              remote: '../koperasi/query/cek_nohp.php'
            },
            kelas: {
              required: true
            },
            status_siswa: {
              required: true
            }
          },
        messages: {
          uid: {
            required: 'Silahkan tap kartu terlebih dahulu.',
            remote: 'UID sudah terdaftar.'
          },
          nis: {
            required: 'Silahkan isi NIS terlebih dahulu.',
            number: 'Hanya boleh angka saja.',
            maxlength: 'NIS tidak boleh lebih dari 9 angka',
            noSpace: 'Tidak boleh mengandung spasi.',
            remote: 'NIS sudah terdaftar.'
          },
          nama: {
            required: 'Silahkan isi nama terlebih dahulu.'
          },
          nohp: {
            required: 'Silahkan isi password terlebih dahulu.',
            number: 'Hanya boleh angka saja.',
            noSpace: 'Tidak boleh mengandung spasi.',
            remote: 'Nomer handphone sudah terdaftar.'
          },
          kelas: {
            required: 'Silahkan isi kelas terlebih dahulu.'
          },
          status_siswa: {
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
                        $("#formtbhsiswa")[0].reset();
                        toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                        tablesiswa.ajax.reload(null, false);
                        $("#modaltbhsiswa").modal('hide');
                      } else {
                        $("#formtbhsiswa")[0].reset();
                        toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                        $("#modaltbhsiswa").modal('hide');
                      }                
                    }
                });
                return false;
            }
      });
    });

    $("#btnsaldo").on('click', function(){
    $("#formsaldo")[0].reset();
    $(".form-group").removeClass('has-error');
    $(".help-block").empty();
      $("#formsaldo").validate({
        rules: {
          uid: {
            required: true
          },
          jtransaksi: {
            required: true
          },
          nominal: {
            required: true
          }
        },
        messages: {
          uid: {
            required: 'Tap kartu terlebih terlebih dahulu.'
          },
          jtransaksi: {
            required: 'Pilih jenis transaksi terlebih dahulu.'
          },
          nominal: {
            required: 'Silahkan isi nominal terlebih dahulu.'
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
                        $("#formsaldo")[0].reset();
                        toastr.success(response.messages, 'Transaksi Sukses', {timeOut: 5000})
                        tablesaldo.ajax.reload(null, false);
                        $("#modalsaldo").modal('hide');
                      } else {
                        $("#formsaldo")[0].reset();
                        toastr.error(response.messages, 'Transaksi Gagal', {timeOut: 5000})
                        $("#modalsaldo").modal('hide');
                      }                
                    }
                });
                return false;
            }
      });
    });

    $("#btnbelanja").on('click', function(){
    $("#formbelanjabarang")[0].reset();
    $(".form-group").removeClass('has-error');
    $(".help-block").empty();
      $("#formbelanjabarang").validate({
        rules: {
          'uid': {
            required: true
          },
          'namabarang[]': {
            required: true
          },
          'kuantitas[]': {
            number: true,
            max: function() {
                return parseInt($('#stok1').val());
            }
          }
        },
        'messages': {
          'uid': {
            required: 'Tap kartu terlebih dahulu.'
          },
          'namabarang[]': {
            required: 'Pilih barang terlebih dahulu'
          },
          'kuantitas[]': {
            max: 'Stok kurang.'
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
                        $("#formbelanjabarang")[0].reset();
                        toastr.success(response.messages, 'Transaksi Sukses', {timeOut: 5000})
                        tablebelanja.ajax.reload(null, false);
                        $("#modalbelanja").modal('hide');
                      } else {
                        $("#formbelanjabarang")[0].reset();
                        toastr.error(response.messages, 'Transaksi Gagal', {timeOut: 5000})
                        $("#modalbelanja").modal('hide');
                      }                
                    }
                });
                return false;
            }
      });
    });

    $("#btnlaporan").on('click', function(){
      $("#cetaklaporan")[0].reset();
      $(".form-group").removeClass('has-error');
      $(".help-block").empty();
      $("#cetaklaporan").validate({
        rules: {
          tgl_awal: {
            required: true
          },
          tgl_akhir: {
            required: true
          }
        },
        messages: {
          tgl_awal: {
            required: 'Isi tanggal terlebih dahulu.'
          },
          tgl_akhir: {
            required: 'Isi tanggal terlebih dahulu.'
          }         
        }
      });
    });
});

function hpsbarang(id_barang) {
  if (id_barang) {
    $("#btnhpsbarang").unbind('click').bind('click', function() {
        $.ajax({
          url: '../koperasi/query/delete_databarang.php',
          type: 'POST',
          data: {id_barang:id_barang},
          dataType: 'json',
          success:function(response) {
            if (response.success == true) {
                toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                tablebarang.ajax.reload(null, false);
                $("#modalhpsbarang").modal('hide');
            } else {
                toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                $("#modalhpsbarang").modal('hide');
            }
          }
        });
    });
  }
}  

function editbarang(id_barang){
  if (id_barang) {
    $("#id_barang").remove();
    $.ajax({
      url: '../koperasi/query/getid_barang.php',
      type: 'POST',
      data: {id_barang:id_barang},
      dataType: 'json',
      success:function(response) {
        $("#editbarang").append('<input type="hidden" name="id_barang" class="form-control" id="id_barang" value="'+response.id_barang+'"/>');
        $("#editnmbarang").val(response.nama_barang);
        $("#edithrgbarang").val(response.harga_barang);
        $("#editstatus_barang").val(response.status_barang);
        $("#formeditbarang").validate({  
            rules: {
              editnmbarang: {
                required: true
              },
              edithrgbarang: {
                required: true
              },
              editstatus_barang: {
                required: true
              }
            },
            messages: {
              editnmbarang: {
                required: 'Silahkan isi nama barang terlebih dahulu.'
              },
              edithrgbarang: {
                required: 'Silahkan isi harga terlebih dahulu.'
              },
              editstatus_barang: {
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
                      tablebarang.ajax.reload(null, false);
                      $("#modaleditbarang").modal('hide');
                    } else {
                      toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                      $("#modaleditbarang").modal('hide');
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

function tambahstok(id_barang){
  if (id_barang) {
    $("#id_barang").remove();
    $.ajax({
      url: '../koperasi/query/getid_barang.php',
      type: 'POST',
      data: {id_barang:id_barang},
      dataType: 'json',
      success:function(response) {
        $("#tambahstok").append('<input type="hidden" name="id_barang" class="form-control" id="id_barang" value="'+response.id_barang+'"/>');
        $("#tbhstok").val();
        $("#formtambahstok").validate({  
            rules: {
              tbhstok: {
                required: true,
                number: true
              }
            },
            messages: {
              tbhstok: {
                required: 'Silahkan masukan stok barang terlebih dahulu.',
                number: 'Hanya boleh angka saja'
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
                      tablebarang.ajax.reload(null, false);
                      $("#modaltambahstok").modal('hide');
                    } else {
                      toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                      $("#modaltambahstok").modal('hide');
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

function detailsiswa(id_siswa){
  if (id_siswa) {
    $("#siswa").html();
    $("#id_siswa").remove();
    $.ajax({
      url: '../koperasi/query/getid_siswa.php',
      type: 'POST',
      data: {id_siswa:id_siswa},
      dataType: 'json',
      success:function(response) {
        $("#iddetailsiswa").append('<input type="hidden" name="iddetailsiswa" class="form-control" id="iddetailsiswa" value="'+response.id_siswa+'"/>');
        $("#detailnis").val(response.nis);
        $("#detailnama").val(response.nama);
        $("#detailwaktu").val(response.tgl_pembuatan);
        $("#detailnohp").val(response.nohp);
        $("#detailkelas").val(response.kelas);
        $("#detailstatus").val(response.status_siswa);
        $("#detailsaldo").val(response.saldo);
      }
    });
  }
}

function editsiswa(id_siswa){
  if (id_siswa) {
    $("#id_siswa").remove();
    $("#nohp2").remove();
    $.ajax({
      url: '../koperasi/query/getid_siswa.php',
      type: 'POST',
      data: {id_siswa:id_siswa},
      dataType: 'json',
      success:function(response) {
        $("#editsiswa").append('<input type="hidden" name="id_siswa" class="form-control" id="id_siswa" value="'+response.id_siswa+'"/>');
        $("#editnis").val(response.nis);
        $("#editnama").val(response.nama);
        $("#editnohp").val("");
        $("#editnohp2").append('<p id="nohp2">Nomor handphone saat ini : '+response.nohp+'</p>');
        $("#editkelas").val(response.id_kelas);
        $("#editstatus_siswa").val(response.status_siswa);
        $("#formeditsiswa").validate({  
            rules: {
              editnis: {
                required: true
              },
              editnama: {
                required: true,
                lettersonly: true
              },
              editnohp: {
                number: true,
                noSpace: true,
                remote: "../koperasi/query/cek_editnohp.php",
              },
              editkelas: {
                required: true
              },
              editstatus_siswa: {
                required: true
              }
            },
            messages: {
              editnis: {
                required: 'Silahkan isi nis terlebih dahulu.'
              },
              editnama: {
                required: 'Silahkan isi nama terlebih dahulu.'
              },
              editnohp: {
                number: 'Hanya boleh angka saja.',
                remote: 'Nomor handphone sudah digunakan.'
              },
              editkelas: {
                required: 'Silahkan isi kelas terlebih dahulu.'
              },
              editstatus_siswa: {
                required: 'Silahkan isi status terlebih dahulu.'
              },
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
                      tablesiswa.ajax.reload(null, false);
                      $("#modaleditsiswa").modal('hide');
                    } else {
                      toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                      $("#modaleditsiswa").modal('hide');
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

function hpssiswa(id_siswa) {
  if (id_siswa) {
    $("#btnhpssiswa").unbind('click').bind('click', function() {
        $.ajax({
          url: '../koperasi/query/delete_datasiswa.php',
          type: 'POST',
          data: {id_siswa:id_siswa},
          dataType: 'json',
          success:function(response) {
            if (response.success == true) {
                toastr.success(response.messages, 'Sukses', {timeOut: 5000})
                tablesiswa.ajax.reload(null, false);
                $("#modalhpssiswa").modal('hide');
            } else {
                toastr.error(response.messages, 'Gagal', {timeOut: 5000})
                $("#modalhpssiswa").modal('hide');
            }
          }
        });
    });
  }
}  

/*function isiformtransaksi(){
  var uid = $("#uid").val();
  $.ajax({
    url: '../koperasi/query/isiformtransaksi.php',
    type: 'POST',
    data:{uid : uid},
    dataType:'json',
    success:function(response){
      $("#id_siswa").val(response.id_siswa);
      $("#nis").val(response.nis);
      $("#nama").val(response.nama);
      $("#saldo").val(response.saldo);
    }
  });
}*/

function tbhbtn(){

  var panjangtablebarang = $("#belanjabarang tbody tr").length;

  var baristable;
  var noArray;
  var hitung;

  if (panjangtablebarang > 0) {
    baristable = $("#belanjabarang tbody tr:last").attr("id");
    noArray = $("#belanjabarang tbody tr:last").attr("class");
    hitung = baristable.substring(3);
    hitung = Number(hitung) + 1;
    noArray = Number(noArray) + 1;
  } else {
    hitung = 1;
    noArray = 0;
  }

  $.ajax({
    url: "../koperasi/query/fetchbarang.php",
    data: "POST",
    dataType: "json",
    success:function(response){
      var tr = "<tr id='row"+hitung+"' class='"+noArray+"'>"+
          "<td style='margin-left:20px;'>"+
            "<div class='form-group'>"+
              "<select class='form-control barangValidate' name='namabarang["+hitung+"]' id='namabarang"+hitung+"' onchange='getbarang("+hitung+")'>"+
                  "<option value=''>Pilih Barang</option>";

              $.each(response, function(index, value) {
                tr += "<option value='"+value[0]+"'>"+value[1]+" | "+value[2]+"</option>";
              });

          tr += "</select>"+
             "</div>"+
           "</td>"+
           "<td style='padding-left:20px;'>"+                 
             "<input type='text' name='harga[]' id='harga"+hitung+"' autocomplete='off' disabled='true' class='form-control' />"+ 
             "<input type='hidden' name='id_barang[]' id='id_barang"+hitung+"' autocomplete='off' class='form-control' />"+ 
             "<input type='hidden' name='hargavalue[]' id='hargavalue"+hitung+"' autocomplete='off' class='form-control' />"+           
           "</td>"+
           "<td style='padding-left:20px;'>"+
             "<div class='form-group'>"+
             "<input type='number' class='form-control stokValidate' name='kuantitas["+hitung+"]' min=1 id='kuantitas"+hitung+"' onchange='gettotal("+hitung+")' autocomplete='off' />"+
             "<input type='hidden' name='stok[]' id='stok"+hitung+"' autocomplete='off' class='form-control' />"+
             "<input type='hidden' name='kuantitasvalue[]' id='kuantitasvalue"+hitung+"' autocomplete='off' class='form-control' />"+
             "</div>"+
           "</td>"+
           "<td style='padding-left:20px;'>"+                 
             "<input type='text' name='total[]' id='total"+hitung+"' autocomplete='off' class='form-control' disabled='true' />"+
             "<input type='hidden' name='totalvalue[]' id='totalvalue"+hitung+"' autocomplete='off' class='form-control' />"+           
           "</td>"+
           "<td>"+
             "<button class='btn btn-default hpsbaris' type='button' onclick='hpsbaris("+hitung+")' ><i class='glyphicon glyphicon-trash'></i></button>"+
           "</td>"+
        "</tr>";
        if (panjangtablebarang > 0) {
          $("#belanjabarang tbody tr:last").after(tr);
        } else {
          $("#belanjabarang tbody").append(tr);
        }
        ValidasiBarang();
        ValidasiStok(hitung);
    }
  });
}

function hpsbaris(row){
  if(row){
    $("#row"+row).remove();
    jumlahbayar();
  }
}

function getbarang(row){
    if (row) {
      var id_barang = $("#namabarang"+row).val();

      if (id_barang == "") {
        $("#id_barang"+row).val("");
        $("#harga"+row).val("");
        $("#kuantitas"+row).val("");
        $("#total"+row).val("");
      } else {
        $.ajax({
            url: "../koperasi/query/selecfetchbarang.php",
            type: "POST",
            data: {id_barang:id_barang},
            dataType: "json",
            success:function(response){
              $("#id_barang"+row).val(response.id_barang);
              $("#harga"+row).val(response.harga_barang);
              $("#hargavalue"+row).val(response.harga_barang);
              $("#stok"+row).val(response.stok);
              $("#kuantitas"+row).val(1);
              $("#kuantitasvalue"+row).val(1);
              
              var total = Number(response.harga_barang) * 1;
              total = total.toFixed(2);
              $("#total"+row).val(total);
              $("#totalvalue"+row).val(total);

              jumlahbayar();
            }
        });
      }
    }
}

function gettotal(row) {
    if (row) {
      var total = Number($("#harga"+row).val()) * Number($("#kuantitas"+row).val());
      total = total.toFixed(2);
      var kuantitas = Number($("#kuantitas"+row).val());
      $("#total"+row).val(total);
      $("#totalvalue"+row).val(total);
      $("#kuantitasvalue"+row).val(kuantitas);

      jumlahbayar();
    }
}

function jumlahbayar(){
    var panjangtablebarang = $("#belanjabarang tbody tr").length;
    var total = 0;
    for (x = 0; x < panjangtablebarang; x++) {
        var tr = $("#belanjabarang tbody tr")[x];
        var hitung = $(tr).attr('id');
        hitung = hitung.substring(3);

        total = Number(total) + Number($("#total"+hitung).val());
    }

    total = total.toFixed(2);

    $("#jumlah").val(total);
    $("#jumlahvalue").val(total);
}

function detailbelanja(id_order){
  if (id_order) {
    $.ajax({
      url: '../koperasi/query/get_nobelanja.php',
      type: 'POST',
      data: {id_order:id_order},
      dataType: 'json',
      success:function(response) {
        //$("#iddetailsiswa").append('<input type="hidden" name="iddetailsiswa" class="form-control" id="iddetailsiswa" value="'+response.id_siswa+'"/>');
        $("#detailorder").val(response.id_order);
        $("#detailnis").val(response.nis);
        $("#detailnama").val(response.nama);
        $("#tglbelanja").val(response.tgl_pembelian);  
        $("#detailjumlah").val(response.jumlah);       
        var tabledetailbelanja = $("#tabledetailbelanja").DataTable( {
          "searching": false,
          "pageLength": 5,
          "lengthChange": false,
          "info":     false,
          "ordering": false,
          "destroy": true,
          "language": {
              "url": "../assets/json/Indonesian.json"
          },
          "ajax": {
            "url": "../koperasi/query/read_detailbelanja.php",
            "type": "POST",
            "data": {id_order:id_order},
            "dataType": 'json',
          },
          "columns": [ 
          { "data": "no" },
          { "data": "nama_barang" },
          { "data": "kuantitas" },
          { "data": "total" },
        ]
       });
      }
    });
  }
} 

var ValidasiBarang = function(){
    $("select.barangValidate").each(function(){
      $(this).rules("add", {
        required: true,
         messages: {
                required: "Pilih barang terlebih dahulu"
        },   
      });
    });
  }

var ValidasiStok = function(value){
    $(".stokValidate").each(function(){
      $(this).rules("add", {
        max: function() {
            return parseInt($('#stok'+value).val());
        },
         messages: {
                max: "Stok kurang."
        },   
      });
    });
  }

