<?php 
  include './../koneksi.php';

  $query1 = mysqli_query($conn, "SELECT id_barang FROM barang");
  $jumlahbarang = mysqli_num_rows($query1);

  $query2 = mysqli_query($conn, "SELECT id_order FROM pembelian");
  $jumlahbelanja = mysqli_num_rows($query2);  

  $query3 = mysqli_query($conn, "SELECT id_siswa FROM siswa");
  $jumlahsiswa = mysqli_num_rows($query3);

  $query4 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE jenis='tambah' OR jenis='tarik'");
  $jumlahsaldo = mysqli_num_rows($query4);
?>
<h3><i class="glyphicon glyphicon-home"></i> Dashboard</h3>
<hr>
<div class="row">
    <div class="col-lg-12 main-chart">
      <div class="row">

        <div class="col-md-2 col-md-offset-2">
          <div class="box1">
                  <span class="glyphicon glyphicon-transfer"></span>
                  <h3><?php echo $jumlahsaldo; ?></h3>
          </div>
                  <center><p><font color="red">Ada <?php echo $jumlahsaldo; ?> data saldo.</font></p></center>
        </div>

        <div class="col-md-2">
          <div class="box1">
                  <span class="glyphicon glyphicon-user"></span>
                  <h3><?php echo $jumlahsiswa; ?></h3>
           </div>
                  <center><p><font color="red">Ada <?php echo $jumlahsiswa; ?> data siswa.</font></p></center>
        </div>

        <div class="col-md-2">
          <div class="box1">
                  <span class="glyphicon glyphicon-th-large"></span>
                  <h3><?php echo $jumlahbarang; ?></h3>
          </div>
                  <center><p><font color="red">Ada <?php echo $jumlahbarang; ?> data barang.</font></p></center>
        </div>

        <div class="col-md-2">
          <div class="box1">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  <h3><?php echo $jumlahbelanja; ?></h3>
           </div>
                  <center><p><font color="red">Ada <?php echo $jumlahbelanja; ?> data belanja.</font></p></center>
        </div>

        </div><!-- /row mt -->
      </div><!-- /row -->
    </div><!-- /col-lg-9 END SECTION MIDDLE -->
