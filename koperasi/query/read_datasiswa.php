<?php
include "../../koneksi.php";

$query = mysqli_query($conn, "SELECT id_siswa, nis, nama, CONCAT(tingkat,' - ',jurusan,' - ',ruangan) AS kelas, status_siswa FROM siswa JOIN kelas USING (id_kelas)");
$result = array();
$result['data'] = array();
$no = 0;

  while ($row = mysqli_fetch_assoc($query)) {
    ++$no;

    if($row['status_siswa'] == 'aktif') {
      $status = '<center><label class="label label-success">Aktif</label></center>';
    } else {
      $status = '<center><label class="label label-danger">Nonaktif</label></center>';
    }    

    $btnaksi='<center>
    <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modaldetailsiswa" onclick="detailsiswa(\''.$row['id_siswa'].'\')">
      <i class="glyphicon glyphicon-zoom-in"></i>
    </a>
    <a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modaleditsiswa" onclick="editsiswa(\''.$row['id_siswa'].'\')">
      <i class="glyphicon glyphicon-pencil"></i>
    </a>
    <a type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalhpssiswa" onclick="hpssiswa(\''.$row['id_siswa'].'\')">
      <i class="glyphicon glyphicon-trash"></i>
    </a>
    </center>';

    $data = array(
      "no" => $no,
      "nis" => $row['nis'],
      "nama" => $row['nama'],
      "kelas" => $row['kelas'],
      "status_siswa" => $status,
      "btnaksi" => $btnaksi,
    );

    array_push($result['data'], $data);
  }

echo json_encode($result);
?>
