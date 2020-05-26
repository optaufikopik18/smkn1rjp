<?php
include "../../koneksi.php";

$sql = mysqli_query($conn, "SELECT MAX(id_barang) FROM barang ");

$datakode = mysqli_fetch_array($sql);
// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 5);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;

  $id_barang = "101".date("y").str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $id_barang = "101".date("y");"001";
}

if($_POST){
    $result = array('success' => false, 'messages' => array());

    $nmbarang = $_POST['nmbarang'];
    $string_replace = array("Rp","."," ");
    $hrgbarang = str_replace($string_replace,'',$_POST['hrgbarang']);
    $stokbarang = $_POST['stokbarang'];
    $status = $_POST['status_barang'];

    $query = mysqli_query($conn,"INSERT INTO barang VALUES ('$id_barang', '$nmbarang', '$hrgbarang', '$stokbarang', '$status')");

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
