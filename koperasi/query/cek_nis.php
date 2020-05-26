<?php
include "../../koneksi.php";

$nis = $_REQUEST['nis'];

$query = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis'");

if (mysqli_num_rows($query) == 0) {
  echo "true";
} else {
  echo "false";
}

?>