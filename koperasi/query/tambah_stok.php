<?php 
 
include '../../koneksi.php';
 
//if form is submitted
if($_POST) {    
 
    $result = array('success' => false, 'messages' => array());
 
    $id_barang = $_POST['id_barang'];
    $query_stok = mysqli_query($conn,"SELECT stok FROM barang WHERE id_barang='$id_barang'");
    $stok_awal = mysqli_fetch_assoc($query_stok);
	$stok = $_POST['tbhstok'] + $stok_awal['stok'];

    $query = mysqli_query($conn,"UPDATE barang SET stok = '$stok' WHERE id_barang = '$id_barang'");
 
    if($query === TRUE) {           
        $result['success'] = true;
        $result['messages'] = "Stok berhasil ditambah.";      
    } else {        
        $result['success'] = false;
        $result['messages'] = "Stok gagal ditambah.";
    }
 
    // close the database connection
    mysqli_close($conn);
 
    echo json_encode($result);
 
}
?>