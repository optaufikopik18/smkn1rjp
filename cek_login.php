<?php
session_start();
include 'koneksi.php';

if ($_SESSION['Captcha'] == $_POST['nilaiCaptcha']) {
       if ( (isset($_POST['username']) && isset($_POST['password']))) {

        $query = "SELECT nama,
                             hak_akses,
                             id_petugas
                      FROM petugas
                      WHERE
                           username=?
                           AND
                           password=?
                           AND
                           status_petugas='aktif'
                      LIMIT 1";

        $check_log = $conn->prepare($query);
        $check_log->bind_param('ss', $username, $password);

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $check_log->execute();

        $check_log->store_result();

        if ( $check_log->num_rows == 1 ) {
            $check_log->bind_result($nama, $hak_akses, $id_petugas);

            while ( $check_log->fetch() ) {
                $_SESSION['user_login'] = $hak_akses;
                $_SESSION['sess_id']    = $id_petugas;
                $_SESSION['nama']       = $nama;

            }

            $check_log->close();

            header('location:'.$hak_akses);
            exit();

        } else {
            header('location: login.php?error_up='.base64_encode('Username dan Password Invalid!!!'));
            exit();         
        }


    } else {
        header('location:login.php');
        exit();
    }
} else {
    header('location: login.php?error_c='.base64_encode('Username dan Password Invalid!!!'));
    exit();
}

?>