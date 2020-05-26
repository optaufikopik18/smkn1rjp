<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SMKN 1 Rajapolah</title>
    <link rel="icon" href="./../../assets/img/logosmk.png" type="image/gif" sizes="16x16">
    <link href="./../../assets/css/bootstrap.css" rel="stylesheet">
    <script src="./../../assets/js/jquery.js"></script>
    <script src="./../../assets/js/bootstrap.min.js"></script>
  </head>
	<?php
		session_start();
		include "../../koneksi.php";
		$detailorder = $_REQUEST['detailorder'];
		$query_detailorder = mysqli_query($conn, "SELECT DATE(tgl_pembelian) AS tgl_pembelian, id_order, jumlah, petugas.nama AS petugas FROM petugas join siswa USING (id_petugas) join pembelian using (id_siswa) WHERE id_order = '$detailorder'");
		$row = mysqli_fetch_assoc($query_detailorder);
	?>
  <body  onload="window.print()">
	<h1 align="center">Koperasi SMKN 1 Rajapolah</h1>
	<h4 align="left">Tanggal : <?php echo $row['tgl_pembelian']; ?></h4>
	<h4 align="left">Petugas : <?php echo $row['petugas']; ?></h4>
	<hr style="border:3px solid black">
	<h4 align="left">No. Order : <?php echo $row['id_order']; ?></h4>
	<div class="row">
	    <div class="col-lg-5 col-lg-offset-3">
	        <div class="modal-body">
	                  <table class="table table-bordered">
					    <thead>
					      <tr>
                             <th>No</th>
						     <th>Nama Barang</th>
						     <th>Kuantitas</th>
						     <th>Total</th>
						  </tr>
					    </thead>
					    <tbody>
					    <?php
							$no = 0;
							$query_belanja = mysqli_query($conn, "SELECT nama_barang, kuantitas, total FROM barang JOIN detail_pembelian USING (id_barang) WHERE id_order = '$detailorder'");							
							while ($row2 = mysqli_fetch_assoc($query_belanja)) {
								++$no;
							?>
					      <tr>
					        <td><?php echo $no; ?></td>
					        <td><?php echo $row2['nama_barang']; ?></td>
					        <td><?php echo $row2['kuantitas']; ?></td>
					        <td><?php echo "Rp. "; echo number_format($row2['total'],0,',','.'); ?></td>				       
					      </tr>
					      <?php
					   		}
					       ?>
					    </tbody>
					  </table>
					  <h4 align="right" style="border: 1px">Jumlah  : <?php echo "Rp. "; echo number_format($row['jumlah'],0,',','.'); ?></h4>
	              </div>
	    </div>
	</div>
  </body>
</html>