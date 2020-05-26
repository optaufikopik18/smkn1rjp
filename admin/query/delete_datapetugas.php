<?php
include "../../koneksi.php";

$result = array('success' => false, 'messages' => array());

$id_petugas = $_POST['id_petugas'];

$query_status_petugas = mysqli_query($conn, "SELECT status_petugas FROM petugas WHERE id_petugas = '$id_petugas'");
$status_petugas = mysqli_fetch_assoc($query_status_petugas);

if ($status_petugas['status_petugas'] == 'nonaktif') {
	$query = mysqli_query($conn,"DELETE FROM petugas WHERE id_petugas = '$id_petugas'");

	if ($query === TRUE) {
		$result['success'] = true;
		$result['messages'] = "Data berhasil di hapus.";
	} else {
		$result['success'] = false;
		$result['messages'] = "Data gagal di hapus.";
	}
} else {
	$result['success'] = false;
	$result['messages'] = "Status petugas aktif.";
}

mysqli_close($conn);

echo json_encode($result);
?>
