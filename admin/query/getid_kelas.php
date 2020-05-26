<?php
include "../../koneksi.php";

$id_kelas = $_POST['id_kelas'];

$query = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");

$result = mysqli_fetch_assoc($query);

if($result['jurusan'] == 'AK'){
	$result['jurusan'] = 'Akuntansi';
} elseif($result['jurusan'] == 'PM'){
	$result['jurusan'] = 'Pemasaran';
} elseif($result['jurusan'] == 'TGB'){
	$result['jurusan'] = 'Teknik Gambar Bangunan';
} elseif($result['jurusan'] == 'TKR'){
	$result['jurusan'] = 'Teknik Kendaraan Ringan';
} else {
	$result['jurusan'] = 'Teknik Komputer dan Jaringan';
}

mysqli_close($conn);

echo json_encode($result);

?>