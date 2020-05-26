<?php
include "../../koneksi.php";

$id_petugas = $_POST['id_petugas'];

$query = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");

$result = mysqli_fetch_assoc($query);

mysqli_close($conn);

echo json_encode($result);

?>