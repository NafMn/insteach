<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
include './include/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucwords(str_replace('.php', '', basename($_SERVER["PHP_SELF"]))); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28ed5f249e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Insteach</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Selamat Datang, <?php echo $_SESSION['username']; ?></li>
                    <li class="sidebar-item">
                        <a href="./dashboard.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#Kelas" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Data Kelas
                        </a>
                        <ul id="Kelas" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="form_kelas.php" class="sidebar-link">Tambah Kelas</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="kelas.php" class="sidebar-link">Lihat Kelas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#Matpel" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Data Mata Pelajaran
                        </a>
                        <ul id="Matpel" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="form_mapel.php" class="sidebar-link">Tambah Mata Pelajaran</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="mapel.php" class="sidebar-link">Lihat Mata Pelajaran</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#Guru" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Data Guru
                        </a>
                        <ul id="Guru" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="input_guru.php" class="sidebar-link">Tambah Guru</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="guru.php" class="sidebar-link">Lihat Guru</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#Jadwal" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Data Jadwal
                        </a>
                        <ul id="Jadwal" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="form_jadwal.php" class="sidebar-link">Tambah Jadwal</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="jadwal.php" class="sidebar-link">Lihat Jadwal</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#alternatif" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Analisa AHP
                        </a>
                        <ul id="alternatif" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="hasil_ahp.php" class="sidebar-link">hasil AHP</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="ahp.php" class="sidebar-link">Lihat AHP</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a>Halo, <?php echo $_SESSION['username']; ?></a>
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/<?php echo $_SESSION['username']; ?>.png" class="avatar img-fluid rounded" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="profile.php" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

