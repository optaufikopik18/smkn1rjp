<?php
include '../../koneksi.php';

$uid = $_POST['uid'];

$query = mysqli_query($conn, "SELECT id_siswa, uid, nis, nama, saldo, tgl_transaksi, nohp
							  FROM transaksi RIGHt JOIN siswa USING (id_siswa) 
    						  WHERE uid = '$uid' AND status_siswa = 'aktif' ORDER BY tgl_transaksi DESC LIMIT 1");

$row = mysqli_fetch_array($query);

if ($row['saldo'] == NULL) {
	$row['saldo'] = 0;
}

$row['saldo'] = 'Rp. '.number_format($row['saldo'],0,',','.');

$result = array(
            'id_siswa' => $row['id_siswa'],
            'nis' => $row['nis'],
            'nama' => $row['nama'],
			'saldo' => $row['saldo'],
			'nohp' => $row['nohp'],);
 echo json_encode($result);
?>