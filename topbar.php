<?php
if(!empty($_SESSION['iduser'])){
?>

<nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-light-600 small"> <?php echo $_SESSION['fullname']; ?></span>
                <i class="fas fa-user-circle fa-sm fa-fw mr-3 text-gray-300" style="font-size: 25px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="admin.php?hlm=user">
                    <i class="fas fa-address-card fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </a>
                <a class="dropdown-item" href="admin.php?hlm=user&sub=pass">
                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>
<?php
} else {
    header("Location: ./");
    die();
}
?>