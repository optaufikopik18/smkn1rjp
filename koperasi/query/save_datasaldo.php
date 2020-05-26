<?php
session_start();
include "../../koneksi.php";
include "../../koneksi2.php";

if($_POST){
    $result = array('success' => false, 'messages' => array());

    $id_siswa = $_POST['id_siswa'];
    $nominal = $_POST['nominal'];
    $jtransaksi = $_POST['jtransaksi'];
    $nohp = $_POST['nohp'];

    $saldo_awal = mysqli_query($conn, "SELECT saldo FROM transaksi JOIN siswa USING (id_siswa) 
    									WHERE id_siswa = '$id_siswa' ORDER BY tgl_transaksi DESC LIMIT 1");
	$row = mysqli_fetch_assoc($saldo_awal);
	$id_petugas = $_SESSION['sess_id'];

    if ($jtransaksi == 'tambah') {    	
      
      $sql = mysqli_query($conn, "SELECT MAX(id_transaksi)FROM transaksi WHERE SUBSTRING(id_transaksi, 1, 4) = 'TR01'");

      $datakode = mysqli_fetch_array($sql);

      if ($datakode) {
        $nilaikode = substr($datakode[0], 5);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $id_transaksi = "TR01-".str_pad($kode, 4, "0", STR_PAD_LEFT);
      } else {
        $id_transaksi = "TR01-0001";
      }

   	 	$saldo = empty($row['saldo']) ? $nominal : $row['saldo'] + $nominal;

    	$query = mysqli_query($conn,"INSERT INTO transaksi VALUES ('$id_transaksi', now(), '$id_siswa', '$saldo', '$nominal', '$jtransaksi', '$id_petugas')");

        $query_sms = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES 
                      ('$nohp', 'Transaksi penambahan saldo sebesar Rp. ".number_format($nominal,0,',','.')." ,berhasil.', 'Gammu')";
        $hasil2 = mysqli_query($conn2, $query_sms);

    	$result['success'] = true;
        $result['messages'] = "Transaksi pengisian saldo berhasil dilakukan.";

    } elseif ($jtransaksi == 'tarik') {

    	if ($row['saldo'] < $nominal) {

    		$result['success'] = false;
            $result['messages'] = "Saldo tidak mencukupi.";

    	} else {

        $sql = mysqli_query($conn, "SELECT MAX(id_transaksi)FROM transaksi WHERE SUBSTRING(id_transaksi, 1, 4) = 'TR02'");

        $datakode = mysqli_fetch_array($sql);

        if ($datakode) {
        $nilaikode = substr($datakode[0], 5);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $id_transaksi = "TR02-".str_pad($kode, 4, "0", STR_PAD_LEFT);
        } else {
        $id_transaksi = "TR02-0001";
        }

    		$saldo = $row['saldo'] - $nominal;
    		

    		$query = mysqli_query($conn,"INSERT INTO transaksi VALUES ('$id_transaksi', now(), '$id_siswa', '$saldo', '$nominal', '$jtransaksi', '$id_petugas')");

            $query_sms = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES 
                      ('$nohp', 'Transaksi pencairan saldo sebesar Rp. ".number_format($nominal,0,',','.')." ,berhasil.', 'Gammu')";
            $hasil2 = mysqli_query($conn2, $query_sms);

    		$result['success'] = true;
        	$result['messages'] = "Transaksi pencairan saldo berhasil dilakukan.";
    	}

    }

    // close the database connection
    mysqli_close($conn);

    echo json_encode($result);

}

?>