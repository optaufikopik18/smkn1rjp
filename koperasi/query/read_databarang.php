<?php
include "../../koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM barang ORDER BY id_barang");
$result = array();
$result['data'] = array();
$no = 0;

  while ($row = mysqli_fetch_assoc($query)) {
    ++$no;    

    $btnaksi='<center>
    <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modaltambahstok" onclick="tambahstok(\''.$row['id_barang'].'\')">
      <i class="glyphicon glyphicon-plus-sign"></i>
    </a>
    <a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modaleditbarang" onclick="editbarang(\''.$row['id_barang'].'\')">
      <i class="glyphicon glyphicon-pencil"></i>
    </a>
    <a type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalhpsbarang" onclick="hpsbarang(\''.$row['id_barang'].'\')">
      <i class="glyphicon glyphicon-trash"></i>
    </a>
    </center>';

    if ($row['stok'] == 0) {
      $row['stok'] = 'Kosong';
    }

    $row['harga_barang'] = 'Rp. '.number_format($row['harga_barang'],0,',','.');

    if($row['status_barang'] == 'aktif') {
      $status = '<center><label class="label label-success">Aktif</label></center>';
    } else {
      $status = '<center><label class="label label-danger">Nonaktif</label></center>';
    }  

    $data = array(
      "no" => $no,
      "nmbarang" => $row['nama_barang'],
      "hrgbarang" => $row['harga_barang'],
      "stok" => $row['stok'],
      "status_barang" => $status,
      "btnaksi" => $btnaksi,
    );

    array_push($result['data'], $data);
  }

echo json_encode($result);
?>
