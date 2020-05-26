<?php
include "../../koneksi.php";

$id_barang = $_POST['id_barang'];

$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id_barang'");

$result = mysqli_fetch_assoc($query);

mysqli_close($conn);

echo json_encode($result);

?>