<?php
include "../../koneksi.php";

$id_barang = $_REQUEST['namabarang'];
$kuantitas = $_REQUEST['kuantitas'];

$query = mysqli_query($conn, "SELECT stok FROM barang WHERE id_barang ='".$id_barang."'");


if (mysqli_fetch_assoc($query) > $kuantitas) {
  echo "true";
} else {
  echo "false";
}

?>
