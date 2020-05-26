<?php
include "../../koneksi.php";

$id_order = $_POST['id_order'];

$query = mysqli_query($conn, "SELECT DATE(tgl_pembelian) AS tgl_pembelian, nis, id_order, nama, jumlah
							  FROM pembelian JOIN siswa USING (id_siswa) 
							  WHERE id_order = '$id_order'");

$result = mysqli_fetch_assoc($query);

$result['jumlah'] = 'Rp. '.number_format($result['jumlah'],0,',','.');
mysqli_close($conn);

echo json_encode($result);

?>