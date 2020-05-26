<?php
include "../../koneksi.php";

$result = array('success' => false, 'messages' => array());

$id_siswa = $_POST['id_siswa'];

$query_status_siswa = mysqli_query($conn, "SELECT status_siswa FROM siswa WHERE id_siswa = '$id_siswa'");
$status_siswa = mysqli_fetch_assoc($query_status_siswa);

if ($status_siswa['status_siswa'] == 'nonaktif') {
	$query = mysqli_query($conn,"DELETE FROM siswa WHERE id_siswa = '$id_siswa'");

	if ($query === TRUE) {
		$result['success'] = true;
		$result['messages'] = "Data berhasil di hapus.";
	} else {
		$result['success'] = false;
		$result['messages'] = "Data gagal di hapus.";
	}
	
} elseif ($status_siswa['status_siswa'] == 'aktif') {
	$result['success'] = false;
	$result['messages'] = "Status siswa aktif.";
}

mysqli_close($conn);

echo json_encode($result);
?>