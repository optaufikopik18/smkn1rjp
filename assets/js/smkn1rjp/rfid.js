$(document).ready(function() {
    var pressed = false; 
    var chars = []; 
    $(window).keypress(function(e) {
        if (e.which >= 48 && e.which <= 57) {
            chars.push(String.fromCharCode(e.which));
        }
        console.log(e.which + ":" + chars.join("|"));
        if (pressed == false) {
            setTimeout(function(){
                if (chars.length >= 10) {
                    var rfid = chars.join("");
                    console.log("RFID: " + rfid);
                    // assign value to some input (or do whatever you want)
                    $(".rfid").val(rfid);
                    isiformtransaksi();
                }
                chars = [];
                pressed = false;
            },500);
        }
        pressed = true;
    });
});


$(".rfid").keypress(function (e) {
    if (e.which === 13) {
        console.log("Prevent form submit.");
        e.preventDefault();
    }
});

function isiformtransaksi(){
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
      $("#nohp").val(response.nohp);
    }
  });
}