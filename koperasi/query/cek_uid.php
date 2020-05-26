<?php
include "../../koneksi.php";

$uid = $_REQUEST['uid'];

$query = mysqli_query($conn, "SELECT * FROM siswa WHERE uid = '$uid'");

if (mysqli_num_rows($query) == 0) {
  echo "true";
} else {
  echo "false";
}

?>
