<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LOGIN</title>
    <link rel="icon" href="assets/img/logosmk.png" type="image/gif" sizes="16x16">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>
  <body>

	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" action="cek_login.php" method="POST" id="formlogin">
		        <h2 class="form-login-heading">Login Petugas</h2>
		        <div class="login-wrap form-group">
		            <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus>
		            <br>
		            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <br>
                <center><td><img src="gambar.php" alt="gambar" /></td></center>
                <br>
                <input type="text" name="nilaiCaptcha" id="captcha" class="form-control" placeholder="Isikan Captcha">
                <br>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Login</button>
		        </div>
            <?php
              if (isset($_GET['error_up'])) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <p align="center">username atau password salah</p>
                </div>
            <?php } else if (isset($_GET['error_c'])){?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <p align="center">Kode captcha salah</p>
                </div>
            <?php } ?>
		      </form>

	  	</div>
	  </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>    
    <script src="assets/js/additional-methods.js"></script>
    <script src="/assets/js/additional-methods.min.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/smkn1rjp/login.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>

  </body>
</html>
