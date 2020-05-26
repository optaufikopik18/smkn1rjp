<?php 
 
include '../../koneksi.php';
 
//if form is submitted
if($_POST) {    
 
    $result = array('success' => false, 'messages' => array());
 
    $id_petugas = $_POST['id_petugas'];
	$nama = addslashes($_POST['editnama']);
	$username = $_POST['editusername'];
    $password = md5($_POST['editpassword']);
    $status = $_POST['editstatus_petugas'];
	$hak_akses = 'koperasi';



    if ($password == MD5(NULL) and $username == NULL) {
      $query = mysqli_query($conn,"UPDATE petugas SET nama = '$nama', hak_akses = '$hak_akses', status_petugas = '$status' WHERE id_petugas = '$id_petugas'");
    } elseif ($password == MD5(NULL)) {
      $query = mysqli_query($conn,"UPDATE petugas SET nama = '$nama', username = '$username', hak_akses = '$hak_akses', status_petugas = '$status' WHERE id_petugas = '$id_petugas'");
    } elseif ($username == NULL) {
      $query = mysqli_query($conn,"UPDATE petugas SET nama = '$nama', hak_akses = '$hak_akses', password = '$password', status_petugas = '$status' WHERE id_petugas = '$id_petugas'"); 
    } else {
      $query = mysqli_query($conn,"UPDATE petugas SET nama = '$nama', username = '$username', hak_akses = '$hak_akses', password = '$password', status_petugas = '$status' WHERE id_petugas = '$id_petugas'");  
    }
    
 
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
