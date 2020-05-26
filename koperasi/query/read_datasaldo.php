<?php
include "../../koneksi.php";

$query = mysqli_query($conn, "SELECT DATE(tgl_transaksi), nis, nama, nominal, jenis FROM transaksi JOIN siswa USING (id_siswa) WHERE jenis='tambah' OR jenis='tarik' ORDER BY tgl_transaksi");
$result = array();
$result['data'] = array();
$no = 0;

  while ($row = mysqli_fetch_assoc($query)) {   
    ++$no;

    if ($row['jenis'] == 'tambah') {
      $jtransaksi = 'Pengisian Saldo';
    } elseif ($row['jenis'] == 'tarik') {
      $jtransaksi = 'Pencairan Saldo';
    } 
    
    $row['nominal'] = 'Rp. '.number_format($row['nominal'],0,',','.');
    $data = array(
      "no" => $no,
      "tgl_transaksi" => $row['DATE(tgl_transaksi)'],
      "nis" => $row['nis'],
      "nama" => $row['nama'],
      "nominal" => $row['nominal'],
      "jtransaksi" => $jtransaksi,
    );

    array_push($result['data'], $data);
  }

echo json_encode($result);
?>