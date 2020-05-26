<?php
include "../../koneksi.php";

$nohp = $_REQUEST['editnohp'];

if(substr(trim($nohp), 0, 1) == '0'){
  $hp = '+62'.substr(trim($nohp), 1);
}

$query = mysqli_query($conn, "SELECT * FROM siswa WHERE nohp = '$hp'");

if (mysqli_num_rows($query) == 0) {
  echo "true";
} else {
  echo "false";
}

?>