<?php 
 
include '../../koneksi.php';
 
//if form is submitted
if($_POST) {    
 
    $result = array('success' => false, 'messages' => array());
 
    $id_siswa = $_POST['id_siswa'];
	$nama = addslashes($_POST['editnama']);
	$nohp = $_POST['editnohp'];
    $kelas = $_POST['editkelas'];
    $status = $_POST['editstatus_siswa'];


    

    if($nohp == NULL){
        $query = mysqli_query($conn,"UPDATE siswa SET nama = '$nama', id_kelas = '$kelas', status_siswa = '$status' WHERE id_siswa = '$id_siswa'");
    } else {
        if(substr(trim($nohp), 0, 1) == '0'){
          $hp = '+62'.substr(trim($nohp), 1);
        }
        $query = mysqli_query($conn,"UPDATE siswa SET nama = '$nama', nohp = '$hp', id_kelas = '$kelas', status_siswa = '$status' WHERE id_siswa = '$id_siswa'");
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
