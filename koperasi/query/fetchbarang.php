<?php 	
include "../../koneksi.php";

$query = mysqli_query($conn,"SELECT id_barang, nama_barang, stok FROM barang");

$result = mysqli_fetch_all($query);

mysqli_close($conn);

echo json_encode($result);
?>