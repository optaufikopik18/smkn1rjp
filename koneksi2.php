<?php
$servername2 = "localhost";
$username2 = "root";
$password2 = "";
$database2 = "sms";

$conn2 = mysqli_connect($servername2,$username2,$password2,$database2);

if (!$conn2) {
  die("Koneksi Gagal :".mysqli_connect_error());
}
?>