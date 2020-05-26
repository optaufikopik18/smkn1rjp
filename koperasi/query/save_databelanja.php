<?php
session_start();
include "../../koneksi.php";
include "../../koneksi2.php";

$result['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
$id_siswa = $_POST['id_siswa'];
$nis = $_POST['nis'];
$nmsiswa = $_POST['nama'];
$nmbarang = $_POST['id_barang'];
$harga = $_POST['hargavalue'];
$kuantitas = $_POST['kuantitasvalue'];
$total = $_POST['totalvalue'];
$jumlah = $_POST['jumlahvalue'];
$id_petugas = $_SESSION['sess_id'];
$nohp = $_POST['nohp'];

$saldo = mysqli_query($conn, "SELECT saldo FROM transaksi JOIN siswa USING (id_siswa)
                              WHERE id_siswa = '$id_siswa' ORDER BY tgl_transaksi DESC LIMIT 1");
$saldosiswa = mysqli_fetch_assoc($saldo);

if($saldosiswa['saldo'] < $jumlah) {
      $result['success'] = false;
      $result['messages'] = "Transaksi pembayaran gagal saldo tidak mencukupi.";
} else {
      $sql2 = mysqli_query($conn, "SELECT MAX(SUBSTRING(id_order,11)) FROM pembelian");
      $datakode2 = mysqli_fetch_array($sql2);

      if ($datakode2) {
        $nilaikode = $datakode2[0];
        // menjadikan $nilaikode ( int )
        $kode = (int) $nilaikode;
        // setiap $kode di tambah 1
        $kode = $kode + 1;

        $id_order = "OR/".date("dmy/").str_pad($kode, 4, "0", STR_PAD_LEFT);
      } else {
        $id_order = "OR/".date("dmy/")."0001";
      }

      $query_pembelian = mysqli_query($conn, "INSERT INTO pembelian VALUES ('$id_order','$id_siswa',NOW(),'$jumlah','$id_petugas')");
      $query_sms = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES 
                      ('$nohp', 'Transaksi belanja sebesar Rp. ".number_format($jumlah,0,',','.')." ,berhasil.', 'Gammu')";
      $hasil2 = mysqli_query($conn2, $query_sms);

      $sql3 = mysqli_query($conn, "SELECT max(id_transaksi) FROM transaksi WHERE SUBSTRING(id_transaksi, 1, 4) = 'TR03'");
        $datakode = mysqli_fetch_array($sql3);
          if ($datakode) {
            $nilaikode = substr($datakode[0], 5);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $id_transaksi = "TR03-".str_pad($kode, 4, "0", STR_PAD_LEFT);
          } else {
            $id_transaksi = "TR03-0001";
          }

        $saldoakhir = empty($saldosiswa['saldo']) ? $jumlah : $saldosiswa['saldo'] - $jumlah;
        $jtransaksi = 'belanja';

        $querytransaksi = mysqli_query($conn,"INSERT INTO transaksi VALUES ('$id_transaksi', now(), '$id_siswa', '$saldoakhir', '$jumlah', '$jtransaksi', '$id_petugas')");

        for($x = 0; $x < count($nmbarang); $x++) { 
          $stok_barang = mysqli_query($conn, "SELECT stok From barang WHERE id_barang = '".$nmbarang[$x]."'");

          while ($stok = mysqli_fetch_row($stok_barang)) {
              $update_stok[$x] = $stok[0] - $kuantitas[$x];

              $updatetablebarang = mysqli_query($conn, "UPDATE barang SET stok = '".$update_stok[$x]."' WHERE id_barang = '".$nmbarang[$x]."'");

              $query_detailpembelian = mysqli_query($conn,"INSERT INTO detail_pembelian VALUES ('$id_order','".$nmbarang[$x]."','".$harga[$x]."','".$kuantitas[$x]."','".$total[$x]."')");
            } 
          }

          $result['success'] = true;
          $result['messages'] = "Transaksi pembelian barang berhasil dilakukan.";
      }

mysqli_close($conn);

echo json_encode($result);

}

?>