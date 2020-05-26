<?php 
 
include '../../koneksi.php';
 
//if form is submitted
if($_POST) {    
 
    $result = array('success' => false, 'messages' => array());
 
    $id_barang = $_POST['id_barang'];
	$nmbarang = $_POST['editnmbarang'];
    $string_replace = array("Rp","."," ");
	$hrgbarang = str_replace($string_replace,'',$_POST['edithrgbarang']);
    $status = $_POST['editstatus_barang'];

    $query = mysqli_query($conn,"UPDATE barang SET nama_barang = '$nmbarang', harga_barang = '$hrgbarang', status_barang = '$status' WHERE id_barang = '$id_barang'");
 
    if($query === TRUE) {           
        $result['success'] = true;
        $result['messages'] = "Data berhasil di edit.";      
    } else {        
        $result['success'] = false;
        $result['messages'] = "Data gagal di edit.";
    }
 
    // close the database connection
    mysqli_close($conn);
 
    echo json_encode($result);
 
}
?>
