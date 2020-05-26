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
                <a href="index.php?halaman=datapetugas">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Data Petugas</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="index.php?halaman=datakelas">
                    <i class="glyphicon glyphicon-th"></i>
                    <span>Data Kelas</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="index.php?halaman=ubahpassword">
                    <i class="glyphicon glyphicon-cog"></i>
                    <span>Ubah Password</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
