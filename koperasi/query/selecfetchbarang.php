<?php 	

include "../../koneksi.php";

$id_barang = $_POST["id_barang"];
$query = mysqli_query($conn, "SELECT id_barang, nama_barang, harga_barang, stok FROM barang WHERE id_barang = '$id_barang'");

$result = mysqli_fetch_array($query);

mysqli_close($conn);

echo json_encode($result);
?>