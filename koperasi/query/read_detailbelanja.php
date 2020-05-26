<?php
include "../../koneksi.php";

$id_order = $_POST['id_order'];

$query = mysqli_query($conn, "SELECT nama_barang, kuantitas, total FROM barang JOIN detail_pembelian USING (id_barang) 
                              WHERE id_order = '$id_order'");
$result = array();
$result['data'] = array();
$no = 0;

  while ($row = mysqli_fetch_assoc($query)) {   
    ++$no;

    $row['total'] = 'Rp. '.number_format($row['total'],0,',','.');

    $data = array(
      "no" => $no,
      "nama_barang" => $row['nama_barang'],
      "kuantitas" => $row['kuantitas'],
      "total" => $row['total'],
    );

    array_push($result['data'], $data);
  }

echo json_encode($result);
?>