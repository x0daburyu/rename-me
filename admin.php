<?php
session_start();
ob_start();

if(empty($_SESSION['iduser'])){
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="XCFirman">

    <title>Admin Page</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">

        <?php include "sidebar.php"; ?>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow"></nav>
                        <div class="container-fluid">

                            <?php

                            if(isset($_REQUEST['hlm'])){
                                
                                $hlm = $_REQUEST['hlm'];
                                
                                switch( $hlm ){
                                    case 'bayar':
                                        include "pembayaran.php";
                                        break;
                                    case 'laporan':
                                        include "laporan.php";
                                        break;
                                    case 'master':
                                        include "master.php";
                                        break;
                                    case 'user':
                                        include "profil.php";
                                        break;
                                }
                            } else {
                            ?>
                              <!-- Main component for a primary marketing message or call to action -->
                              <div class="jumbotron">
                                <h2 align="center">APLIKASI PEMBAYARAN SPP</h2>
                                <br>
                                <p align="center">
                                    <img src="img/saitama.png" width="250px">
                                </p>
                                <p align="center">Selamat Datang<strong> <?php echo $_SESSION['fullname']; ?></strong></p>
                              </div>
                            <?php
                                }
                            ?>
                            </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
<?php
}
?>