<?php
include "../../koneksi.php";

$id_siswa = $_POST['id_siswa'];

$query = mysqli_query($conn, "SELECT id_siswa, nis, nama, nohp, saldo, tgl_pembuatan, id_kelas, CONCAT(tingkat,' - ',jurusan,' - ',ruangan) AS kelas, status_siswa FROM transaksi RIGHt JOIN siswa USING (id_siswa) JOIN kelas USING (id_kelas) WHERE id_siswa = '$id_siswa' ORDER BY tgl_transaksi DESC LIMIT 1");

$result = mysqli_fetch_assoc($query);

if ($result['saldo'] == NULL) {
	$result['saldo'] = 0;
}

if(substr(trim($result['nohp']), 0, 3)=='+62'){
   $result['nohp'] = trim($result['nohp']);
}

$result['saldo'] = 'Rp. '.number_format($result['saldo'],0,',','.');
mysqli_close($conn);

echo json_encode($result);

?>