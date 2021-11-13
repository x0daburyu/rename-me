<?php
if(!empty($_SESSION['iduser'])){
?>

<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fire"></i>
        </div>
        <div class="sidebar-brand-text mx-3">APLIKASI SPP</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="admin.php">
            <i class="fa fa-home"></i>
            <span>Home</span></a>
    </li>
    <hr class="sidebar-divider my-1">
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
            aria-expanded="true" aria-controls="collapse">
            <i class="fas fa-users-cog"></i>
            <span><?php echo $_SESSION['fullname']; ?></span>
        </a>
    <div id="collapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="./admin.php?hlm=user">Profil</a>
            <a class="collapse-item" href="./admin.php?hlm=user&sub=pass">Ganti Password</a>
        </div>
    </li>
<?php if($_SESSION['admin'] == 1 ){ ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="./admin.php?hlm=master&sub=jurusan">Jurusan</a>
                <a class="collapse-item" href="./admin.php?hlm=master&sub=siswa">Siswa</a>
                <a class="collapse-item" href="./admin.php?hlm=master&sub=kelas">Kelas</a>
                <a class="collapse-item" href="./admin.php?hlm=master&sub=tapel">Tahun Pelajaran</a>
            </div>
        </div>
    </li>
<?php
} 
?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Lainnya
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py collapse-inner rounded">
                <a class="collapse-item" href="./admin.php?hlm=laporan">Rekap Pembayaran</a>
                <a class="collapse-item" href="./admin.php?hlm=laporan&sub=tagihan">Cetak Tagihan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-chart-bar"></i>
            <span>Pembayaran</span>
        </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="./admin.php?hlm=bayar">Bayar</a>
            <?php if($_SESSION['admin'] == 1 ){ ?>
            <a class="collapse-item" href="./admin.php?hlm=master&sub=jenis">Jenis Pembayaran</a>
        </div>
    <li class="nav-item">
        <a class="nav-link" href="./admin.php?hlm=master">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
        <span>User</span></a>
    <?php 
    } 
    ?>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
        <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
        <span>Logout</span></a>
    </li>
</ul>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="logout.php">Keluar</a>
            </div>
        </div>
    </div>
</div>

<?php
} else {
    header("Location: ./");
    die();
}
?>