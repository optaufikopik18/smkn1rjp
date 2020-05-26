<?php
include "../../koneksi.php";

$result = array('success' => false, 'messages' => array());

$id_barang = $_POST['id_barang'];

$query_status_barang = mysqli_query($conn, "SELECT status_barang FROM barang WHERE id_barang = '$id_barang'");
$status_barang = mysqli_fetch_assoc($query_status_barang);

if ($status_barang['status_barang'] == 'nonaktif') {
	$query = mysqli_query($conn,"DELETE FROM barang WHERE id_barang = '$id_barang'");

	if ($query === TRUE) {
		$result['success'] = true;
		$result['messages'] = "Data berhasil di hapus.";
	} else {
		$result['success'] = false;
		$result['messages'] = "Data gagal di hapus.";
	}
} else {
	$result['success'] = false;
	$result['messages'] = "Status barang aktif.";
}

mysqli_close($conn);

echo json_encode($result);
?>
