<?php
include "koneksi.php";
include "koneksi2.php";

// query untuk membaca SMS yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysqli_query($conn2, $query);
while ($data = mysqli_fetch_array($hasil))
{
  // membaca ID SMS
  $id = $data['ID'];

  // membaca no pengirim
  $noPengirim = $data['SenderNumber'];

  // membaca pesan SMS dan mengubahnya menjadi kapital
  $msg = strtoupper($data['TextDecoded']);

  // proses parsing 

  // memecah pesan berdasarkan karakter <spasi>
  $pecah = explode(" ", $msg);

  // jika kata terdepan dari SMS adalah 'NILAI' maka cari nilai Kalkulus
  if ($pecah[0] == "CEK" && $pecah[1] == "SALDO")
  {

     // cari nilai kalkulus berdasar NIM
     $query2 = "SELECT nama, saldo FROM transaksi RIGHT JOIN siswa USING (id_siswa) WHERE nohp='$noPengirim' ORDER BY tgl_transaksi DESC LIMIT 1";
     $hasil2 = mysqli_query($conn, $query2);

     // cek bila data nilai tidak ditemukan
     if (mysqli_num_rows($hasil2) == 0) $reply = "Nomor tidak terdaftar.";
     else
     {
        // bila nilai ditemukan
        $data2 = mysqli_fetch_array($hasil2);
        $saldo = $data2['saldo'];
        if($saldo == NULL){
          $reply = "Saldo anda saat ini Rp. 0";
        } else {
          $reply = "Saldo anda saat ini Rp.".number_format($saldo,0,',','.');
        }
     }
  }
  else $reply = "Maaf perintah salah";

  // membuat SMS balasan

  $query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
  $hasil3 = mysqli_query($conn2, $query3);

  // ubah nilai 'processed' menjadi 'true' untuk setiap SMS yang telah diproses

  $query3 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
  $hasil3 = mysqli_query($conn2, $query3);
}
?>