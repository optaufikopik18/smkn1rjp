<?php
include "../../koneksi.php";

$result = array('success' => false, 'messages' => array());

$id_kelas = $_POST['id_kelas'];

$query_status_kelas = mysqli_query($conn, "SELECT status_kelas FROM kelas WHERE id_kelas = '$id_kelas'");
$status_kelas = mysqli_fetch_assoc($query_status_kelas);


if ($status_kelas['status_kelas'] == 'nonaktif') {
	$query = mysqli_query($conn,"DELETE FROM kelas WHERE id_kelas = '$id_kelas'");

	if ($query === TRUE) {
		$result['success'] = true;
		$result['messages'] = "Data berhasil di hapus.";
	} else {
		$result['success'] = false;
		$result['messages'] = "Data gagal di hapus.";
	}
} else {
	$result['success'] = false;
	$result['messages'] = "Status kelas aktif.";
}

mysqli_close($conn);

echo json_encode($result);
?>