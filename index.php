<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>OnLibrary</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="dark-mode.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html"><i class="fas fa-book-open" style="margin-right: 10px;"></i>OnLibrary</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <span class="ms-1">
                        <?php echo $_SESSION['user']['nama']; ?>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!"><i class="fas fa-gear"></i>&nbsp;Pengaturan</a></li>
                    <li><a class="dropdown-item" href="#!"><i class="fas fa-history"></i>&nbsp;Log Aktivitas</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!" id="darkModeToggle"><i class="fas fa-moon"></i>&nbsp;Dark
                            Mode</a></li>
                    <li><a class="dropdown-item" href="logout.php"><i class="fas fa-power-off"></i>&nbsp;Keluar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</body>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="?page=home">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Beranda
                    </a>
                    <div class="sb-sidenav-menu-heading">Navigasi</div>
                    <?php
                    if ($_SESSION['user']['level'] != 'peminjam') {
                        ?>
                        <a class="nav-link" href="?page=kategori">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Kategori
                        </a>
                        <a class="nav-link" href="?page=buku">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Buku
                        </a>
                        <?php
                    } else {
                        ?>
                        <a class="nav-link" href="?page=peminjaman">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Peminjaman
                        </a>

                        <a class="nav-link" href="?page=koleksi_saya">
                            <div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
                            Koleksi saya
                        </a>

                        <?php
                    }
                    ?>
                    <a class="nav-link" href="?page=ulasan">
                        <div class="sb-nav-link-icon"><i class="fa fa-comment"></i></div>
                        Ulasan
                    </a>
                    <?php
                    if ($_SESSION['user']['level'] != 'peminjam') {
                        ?>
                        <a class="nav-link" href="?page=laporan">
                            <div class="sb-nav-link-icon"><i class="fa fa-table"></i></div>
                            Laporan Peminjaman
                        </a>
                        <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['user']['level'] != 'petugas') {
                        ?>
                        <a class="nav-link" href="?page=user">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Data Akun
                        </a>
                        <?php
                    }
                    ?>
                    <a class="nav-link" href="logout.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                        Keluar
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Masuk sebagai :</div>
                <?php echo $_SESSION['user']['nama']; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?php

                $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                if (file_exists($page . '.php')) {
                    include $page . '.php';
                } else {
                    include '404.php';
                }
                ?>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="dark-mode.js"></script>
</body>

</html>