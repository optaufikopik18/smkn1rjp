<?php
include "../../koneksi.php";

$query = mysqli_query($conn, "SELECT id_kelas, CONCAT(tingkat,' - ',jurusan,' - ',ruangan) AS kelas, status_kelas FROM kelas ORDER BY id_kelas");
$result = array();
$result['data'] = array();
$no = 0;

  while ($row = mysqli_fetch_assoc($query)) {
    ++$no;

    if($row['status_kelas'] == 'aktif') {
      $status = '<center><label class="label label-success">Aktif</label></center>';
    } else {
      $status = '<center><label class="label label-danger">Nonaktif</label></center>';
    }

    $kelas = '<center>'.$row['kelas'].'</center>';
    

    $btnaksi='<center>
    <a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modaleditkelas" onclick="editkelas(\''.$row['id_kelas'].'\')">
      <i class="glyphicon glyphicon-pencil"></i>
    </a>
    <a type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalhpskelas" onclick="hpskelas(\''.$row['id_kelas'].'\')">
      <i class="glyphicon glyphicon-trash"></i>
    </a>
    </center>';

    $data = array(
      "no" => $no,
      "kelas" => $kelas,
      "status_kelas" => $status,
      "btnaksi" => $btnaksi,
    );

    array_push($result['data'], $data);
  }

echo json_encode($result);
?>
