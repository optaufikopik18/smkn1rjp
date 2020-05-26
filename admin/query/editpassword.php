<?php 
session_start();
include '../../koneksi.php';
 
//if form is submitted
if($_POST) {    
 
    $result = array('success' => false, 'messages' => array());
 
    $id_petugas = $_SESSION['sess_id'];
	$password = md5($_POST['konfirmasi_password']);

    $query = mysqli_query($conn,"UPDATE petugas SET password = '$password' WHERE id_petugas = '$id_petugas'");
 
    if($query === TRUE) {           
        $result['success'] = true;
        $result['messages'] = "Password berhasil di edit.";      
    } else {        
        $result['success'] = false;
        $result['messages'] = "Password gagal di edit.";
    }
 
    // close the database connection
    mysqli_close($conn);
 
    echo json_encode($result);
 
}
?>