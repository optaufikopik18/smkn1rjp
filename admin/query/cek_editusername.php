<?php
include "../../koneksi.php";

$username = $_REQUEST['editusername'];

$query = mysqli_query($conn, "SELECT * FROM petugas WHERE username='$username'");

if(mysqli_num_rows($query) == 0) {
	echo "true";
} else {
	echo "false";
}

?>