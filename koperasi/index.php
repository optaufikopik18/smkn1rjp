<?php
session_start();
if ( !isset($_SESSION['user_login']) ||
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'koperasi' ) ) {

  header('location:./../login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SMKN 1 Rajapolah</title>
    <link rel="icon" href="./../assets/img/logosmk.png" type="image/gif" sizes="16x16">
    <link href="./../assets/css/bootstrap.css" rel="stylesheet">
    <link href="./../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="./../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="./../assets/lineicons/style.css">
    <link href="./../assets/css/style.css" rel="stylesheet">
    <link href="./../assets/css/style-responsive.css" rel="stylesheet">
    <link href="./../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="./../assets/css/toastr.min.css" rel="stylesheet">
    <link href="./../assets/css/bootstrap-datepicker.css" rel="stylesheet"> 
  </head>

  <body>
  <section id="container" >

      <!--Header start-->
      <?php include "header.php"; ?>
      <!--header end-->

      <!--sidebar start-->
      <?php include "sidebar.php"; ?>
      <!--sidebar end-->

      <!--main content start-->
      <?php include "main.php"; ?>
      <!--main content end-->

      <!--footer start-->
      <?php include "footer.php"; ?>
      <!--footer end-->
  </section>

    <script src="./../assets/js/jquery.js"></script>
    <script src="./../assets/js/jquery-1.8.3.min.js"></script>
    <script src="./../assets/js/jquery.maskMoney.min.js"></script>
    <script src="./../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="./../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="./../assets/js/jquery.scrollTo.min.js"></script>
    <script src="./../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="./../assets/js/jquery.sparkline.js"></script>
    <script src="./../assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="./../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="./../assets/js/gritter-conf.js"></script>
    <script src="./../assets/js/sparkline-chart.js"></script>
	  <script src="./../assets/js/zabuto_calendar.js"></script>
    <script src="./../assets/js/chart-master/Chart.js"></script>
    <script src="./../assets/js/jquery.dataTables.min.js"></script>
    <script src="./../assets/js/dataTables.bootstrap.min.js"></script>
    <script src="./../assets/js/additional-methods.js"></script>
    <script src="./../assets/js/additional-methods.min.js"></script>
    <script src="./../assets/js/jquery.validate.js"></script>
    <script src="./../assets/js/jquery.validate.min.js"></script>
    <script src="./../assets/js/toastr.min.js"></script>
    <script src="./../assets/js/bootstrap-datepicker.js"></script>
    <script src="./../assets/js/moment.min.js"></script>
    <script src="./../assets/js/smkn1rjp/koperasi.js"></script>
    <script src="./../assets/js/smkn1rjp/rfid.js"></script>

  </body>
</html>
