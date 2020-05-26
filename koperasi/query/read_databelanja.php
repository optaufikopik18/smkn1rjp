<?php
include "../../koneksi.php";

$query = mysqli_query($conn, "SELECT DATE(tgl_pembelian), id_order, nama, jumlah FROM pembelian JOIN siswa USING (id_siswa) ORDER BY tgl_pembelian");
$result = array();
$result['data'] = array();
$no = 0;

  while ($row = mysqli_fetch_assoc($query)) {   
    ++$no;
    
    $btnaksi='<center>
    <a type="button" class="btn btn-default btn-xs" data-toggle="modal" target="_blank" href="query/struk_belanja.php?detailorder='.$row['id_order'].'">
      <i class="glyphicon glyphicon-print"></i>
    </a>
    <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modaldetailbelanja" onclick="detailbelanja(\''.$row['id_order'].'\')">
      <i class="glyphicon glyphicon-zoom-in"></i>
    </a>
    </center>';
    
    $row['jumlah'] = 'Rp. '.number_format($row['jumlah'],0,',','.');
    $data = array(
      "no" => $no,
      "tgl_pembelian" => $row['DATE(tgl_pembelian)'],
      "no_order" => $row['id_order'],
      "nama" => $row['nama'],
      "jumlah" => $row['jumlah'],
      "btnaksi" => $btnaksi,
    );

    array_push($result['data'], $data);
  }

echo json_encode($result);
?>