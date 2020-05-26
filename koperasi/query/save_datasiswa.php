<?php
session_start();
include "../../koneksi.php";

$sql = mysqli_query($conn, "SELECT max(id_siswa) FROM siswa");

$datakode = mysqli_fetch_array($sql);
// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 8);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;

  $id_siswa = "SW-".date("y-").str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
  $id_siswa = "SW-".date("y-");"0001";
}

if($_POST){
    $result = array('success' => false, 'messages' => array());

    $uid = $_POST['uid'];
    $nis = $_POST['nis'];
    $nama = addslashes($_POST['nama']);
    $nohp = $_POST['nohp'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status_siswa'];
    $id_petugas = $_SESSION['sess_id'];

    if(substr(trim($nohp), 0, 1) == '0'){
      $hp = '+62'.substr(trim($nohp), 1);
    }

    $query = mysqli_query($conn,"INSERT INTO siswa VALUES ('$id_siswa', '$uid', '$nis', '$nama', '$hp', '$kelas', '$status', NOW(), '$id_petugas')");

    if($query === TRUE) {
        $result['success'] = true;
        $result['messages'] = "Data Berhasil di tambah.";
    } else {
        $result['success'] = false;
        $result['messages'] = "Data gagal di tambah.";
    }

    // close the database connection
    mysqli_close($conn);

    echo json_encode($result);
}

?>
