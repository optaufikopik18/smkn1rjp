<section id="main-content">
    <section class="wrapper site-min-height">
      <?php
      if (isset($_GET['halaman'])) {
        $halaman = $_GET['halaman'];
        switch ($halaman) {
          case 'dashboard':
            include "halaman/dashboard.php";
            break;
          case 'databarang':
            include "halaman/databarang.php";
            break;
         case 'datasiswa':
            include "halaman/datasiswa.php";
            break;
         case 'datasaldo':
            include "halaman/datasaldo.php";
            break;
         case 'databelanja':
            include "halaman/databelanja.php";
            break;
        case 'laporan':
            include "halaman/laporan.php";
            break;
          default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
        }
      } else {
        include "halaman/dashboard.php";
      }
      ?>
    </section>
</section>
