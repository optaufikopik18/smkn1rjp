<?php
include "../../koneksi.php";

$nip = $_REQUEST['nip'];

$query = mysqli_query($conn, "SELECT * FROM petugas WHERE nip = '$nip'");

if (mysqli_num_rows($query) == 0) {
  echo "true";
} else {
  echo "false";
}

?>