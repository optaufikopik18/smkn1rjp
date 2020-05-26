<?php
include "../../koneksi.php";

$id_siswa = $_POST['id_siswa'];
$s = mysqli_query($conn, "SELECT @s := 0");

$query = mysqli_query($conn, "SELECT id_siswa, DATE(tgl_transaksi), jenis, @k := IF(jenis = 'SIMPAN', nominal, 0) AS kredit, 
                              @d := IF(jenis = 'TARIK' OR jenis = 'BELANJA', nominal, 0) AS debet, @s := @s + @k - @d AS saldo 
                              FROM transaksi WHERE id_siswa = '$id_siswa' ORDER BY tgl_transaksi");
$result = array();
$result['data'] = array();
$no = 0;

  while ($row = mysqli_fetch_assoc($query)) {   
    ++$no;

    if ($row['jenis'] == 'SIMPAN') {
      $jtransaksi = 'TR01';
    } elseif ($row['jenis'] == 'TARIK') {
      $jtransaksi = 'TR02';
    } else {
      $jtransaksi = 'TR03';
    }

    $row['kredit'] = 'Rp. '.number_format($row['kredit'],0,',','.');
    $row['debet'] = 'Rp. '.number_format($row['debet'],0,',','.');
    $row['saldo'] = 'Rp. '.number_format($row['saldo'],0,',','.');

    $data = array(
      "no" => $no,
      "tgl_transaksi" => $row['DATE(tgl_transaksi)'],
      "jenis_transaksi" => $jtransaksi,
      "kredit" => $row['kredit'],
      "debet" => $row['debet'],
      "saldo" => $row['saldo'],
    );

    array_push($result['data'], $data);
  }

echo json_encode($result);
?>