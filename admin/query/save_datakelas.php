<?php
include "../../koneksi.php";

$sql = mysqli_query($conn, "SELECT max(id_kelas) FROM kelas");

$datakode = mysqli_fetch_array($sql);
// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 2);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;

  $id_kelas = "KA".str_pad($kode, 2, "0", STR_PAD_LEFT);
} else {
  $id_kelas = "KA01";
}

if($_POST){
    $result = array('success' => false, 'messages' => array());

    $tingkat = $_POST['tingkat'];
    $jurusan = $_POST['jurusan'];
    $ruangan = $_POST['ruangan'];
    $status = $_POST['status_kelas'];

    $query1 = mysqli_query($conn,"SELECT CONCAT(tingkat,'-',jurusan,'-',ruangan) AS kelas, status_kelas FROM kelas 
                                  WHERE CONCAT(tingkat,'-',jurusan,'-',ruangan)='$tingkat-$jurusan-$ruangan'");
    if(mysqli_fetch_array($query1) > 0){
      $result['success'] = false;
      $result['messages'] = "Data gagal di tambah kelas sudah ada.";
    } else {
      $query = mysqli_query($conn,"INSERT INTO kelas VALUES ('$id_kelas', '$tingkat', '$jurusan', '$ruangan', '$status')");

      if($query === TRUE) {
          $result['success'] = true;
          $result['messages'] = "Data Berhasil di tambah.";
      } else {
          $result['success'] = false;
          $result['messages'] = "Data gagal di tambah.";
      }
    }

    // close the database connection
    mysqli_close($conn);

    echo json_encode($result);

}

?>
