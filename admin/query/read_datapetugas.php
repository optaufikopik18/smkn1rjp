<?php
include "../../koneksi.php";

$query = mysqli_query($conn, "SELECT id_petugas, nip, nama, username, hak_akses, status_petugas FROM petugas
                              WHERE hak_akses='koperasi' OR hak_akses='admin'");
$result = array();
$result['data'] = array();
$no = 0;

  while ($row = mysqli_fetch_assoc($query)) {
    ++$no;

    if ($row['hak_akses'] == 'admin' ) {
      $hak_akses = 'Admin';
    } else {
      $hak_akses = 'Petugas Koperasi';
    }

    if($row['status_petugas'] == 'aktif') {
      $status = '<center><label class="label label-success">Aktif</label></center>';
    } else {
      $status = '<center><label class="label label-danger">Nonaktif</label></center>';
    }
    

    $btnaksi='<center>
    <a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modaleditpetugas" onclick="editpetugas(\''.$row['id_petugas'].'\')">
      <i class="glyphicon glyphicon-pencil"></i>
    </a>
    <a type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalhpspetugas" onclick="hpspetugas(\''.$row['id_petugas'].'\')">
      <i class="glyphicon glyphicon-trash"></i>
    </a>
    </center>';

    $data = array(
      "no" => $no,
      "nip" => $row['nip'],
      "nama" => $row['nama'],
      "username" => $row['username'],
      "hak_akses" => $row['hak_akses'],
      "status_petugas" => $status,
      "btnaksi" => $btnaksi,
    );

    array_push($result['data'], $data);
  }

echo json_encode($result);
?>
