<section id="main-content">
    <section class="wrapper site-min-height">
      <?php
      if (isset($_GET['halaman'])) {
        $halaman = $_GET['halaman'];
        switch ($halaman) {
          case 'dashboard':
            include "halaman/dashboard.php";
            break;
          case 'datapetugas':
            include "halaman/datapetugas.php";
            break;
          case 'datajurusan':
            include "halaman/datajurusan.php";
            break;
          case 'datakelas':
            include "halaman/datakelas.php";
            break;
        case 'ubahpassword':
            include "halaman/ubahpassword.php";
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
