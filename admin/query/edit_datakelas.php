<?php 
 
include '../../koneksi.php';
 
//if form is submitted
if($_POST) {    
 
    $result = array('success' => false, 'messages' => array());
 
    $id_kelas = $_POST['id_kelas'];
	$edittingkat = $_POST['edittingkat'];
    $editruangan = $_POST['editruangan'];
    $status = $_POST['editstatus_kelas'];

    if($_POST['editjurusan'] == 'Akuntansi'){
        $editjurusan = 'AK';
    } elseif($_POST['editjurusan'] == 'Pemasaan'){
        $editjurusan = 'PM';
    } elseif($_POST['editjurusan'] == 'Teknik Gambar Bangunan'){
        $editjurusan = 'TGB';
    } elseif($_POST['editjurusan'] == 'Teknik Kendaraan Ringan'){
        $editjurusan = 'TKR';
    } else {
        $editjurusan = 'TKJ';
    }

    $query = mysqli_query($conn,"UPDATE kelas SET tingkat = '$edittingkat', jurusan = '$editjurusan', ruangan = '$editruangan', status_kelas = '$status' WHERE id_kelas = '$id_kelas'"); 
    
    
 
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
