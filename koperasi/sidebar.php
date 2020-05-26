<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="./../assets/img/user.png" class="img-circle" width="60"></a></p>
            <h5 class="centered"><?=$_SESSION['nama'];?></h5>

            <li class="mt">
                <a href="index.php?halaman=dashboard">
                    <i class="glyphicon glyphicon-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="index.php?halaman=databarang">
                    <i class="glyphicon glyphicon-th-large"></i>
                    <span>Data Barang</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="index.php?halaman=datasiswa">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Data Siswa</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="index.php?halaman=datasaldo">
                    <i class="glyphicon glyphicon-transfer"></i>
                    <span>Data Saldo</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="index.php?halaman=databelanja">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span>Data Belanja</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
