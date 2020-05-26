<?php
include "../../koneksi.php";

$sql = mysqli_query($conn, "SELECT max(id_petugas) FROM petugas");

$datakode = mysqli_fetch_array($sql);
// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 3);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;

  $id_petugas = "PT-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $id_petugas = "PT-001";
}

if($_POST){
    $result = array('success' => false, 'messages' => array());

    $nip = $_POST['nip'];
    $nama = addslashes($_POST['nama']);
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $status = $_POST['status_petugas'];
    $hak_akses = $_POST['hak_akses'];

    $query = mysqli_query($conn,"INSERT INTO petugas VALUES ('$id_petugas', '$nip', '$nama', '$username', '$password', '$status', '$hak_akses')");

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
