<?php 
  include './../koneksi.php';

  $query = mysqli_query($conn, "SELECT id_petugas AS jumlah FROM petugas");
  $jumlahpetugas = mysqli_num_rows($query); 

   $query = mysqli_query($conn, "SELECT id_kelas FROM kelas");
  $jumlahkelas = mysqli_num_rows($query); 
?>
<h3><i class="glyphicon glyphicon-home"></i> Dashboard</h3>
<hr>
<div class="row">
    <div class="col-lg-12 main-chart">
      <div class="row">

        <div class="col-md-2 col-md-offset-4">
            <div class="box1">
              <span class="glyphicon glyphicon-user"></span>
              <h3><?php echo $jumlahpetugas ?></h3>
            </div>
          <center><p><font color="red">ada <?php echo $jumlahpetugas ?> data petugas.</font></p></center>
        </div>

        <div class="col-md-2">
            <div class="box1">
              <span class="glyphicon glyphicon-th"></span>
                <h3><?php echo $jumlahkelas ?></h3>
              </div>
            <center><p><font color="red">ada <?php echo $jumlahkelas ?> data kelas.</font></p></center>
        </div>

        </div><!-- /row mt -->
      </div><!-- /row -->
    </div><!-- /col-lg-9 END SECTION MIDDLE -->
