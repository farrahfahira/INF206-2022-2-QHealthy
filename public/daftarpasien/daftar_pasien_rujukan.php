<?php
require '../config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QHealthy | Home</title>


    <!-- Javascript library files -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>


    <!--  CSS files -->

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">

    <link rel="stylesheet" href="../css/home.css" />

</head>

<body>
    <nav>
        <div class="sidebar-top">
            <span class="shrink-btn">
                <i class="bx bx-chevron-left"></i>
            </span>
            <img src="../assets/logo.png" class="logo" alt="" />
            <h3 class="hide">QHealthy</h3>
        </div>

        <div class="search">
            <i class="bx bx-search"></i>
            <input type="text" class="hide" placeholder="Quick Search ..." />
        </div>

        <div class="sidebar-links">
            <ul>
                <div class="active-tab"></div>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="home.php" class="active" data-active="0">
                        <div class="icon">
                            <i class="bx bx-notepad"></i>
                            <i class="bx bxs-notepad"></i>
                        </div>
                        <span class="link hide">Daftar Pasien</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="../rekammedis/rm.php" data-active="1">
                        <div class="icon">
                            <i class="bx bx-folder"></i>
                            <i class="bx bxs-folder"></i>
                        </div>
                        <span class="link hide">Rekam Medis</span>
                    </a>
                </li>

                <div class="tooltip">
                    <span class="show">Daftar Pasien</span>
                    <span>Rekam Medis</span>
                </div>
            </ul>
        </div>

        <div class="sidebar-footer">
            <a href="#" class="account tooltip-element" data-tooltip="0">
                <i class="bx bx-user"></i>
            </a>
            <div class="admin-user tooltip-element" data-tooltip="1">
                <div class="admin-profile hide">
                    <img src="../assets/foto1.png" alt="" />
                    <div class="admin-info">
                        <h3>Admin</h3>
                        <h5>Fulan</h5>
                    </div>
                </div>
                <a class="btn log-out" href="../logout.php">
                    <i class="bx bx-log-out"></i>
                </a>
            </div>
            <div class="tooltip">
                <span class="show">Fulan</span>
                <span>Logout</span>
            </div>
        </div>
    </nav>

    <main>
        <h1>Detail Pasien</h1>
        <hr>
        <div class="data_pasien">
            <?php

            $id = $_GET['id'];
            $daftar_pasien = mysqli_query($conn, "SELECT * FROM daftar_pasien WHERE No_RM = '$id'");
            while ($row = mysqli_fetch_array($daftar_pasien)) {
                $no_rm = $row['No_RM'];
                $nama = $row['Nama'];
                $usia = $row['Usia'];
                $jk = $row['Jenis Kelamin'];
                $goldar = $row['Gol Darah'];
                $tb = $row['TB'];
                $bb = $row['BB'];
                $pekerjaan = $row['Pekerjaan'];
                $alamat = $row['Alamat'];
                $no_telp = $row['No Telp'];
            }

            echo "No RM : " . $no_rm;
            echo "<br />";
            echo "Nama : " . $nama;
            echo "<br />";
            echo "Usia : " . $usia;
            echo "<br />";
            echo "Jenis Kelamin : " . $jk;
            echo "<br />";
            echo "Gol. Darah : " . $goldar;
            echo "<br />";
            echo "TB / BB : " . $tb;
            echo " cm / " . $bb;
            echo " kg";
            echo "<br />";
            echo "Pekerjaan : " . $pekerjaan;
            echo "<br />";
            echo "Alamat : " . $alamat;
            echo "<br />";
            echo "No. Telp : " . $no_telp;

            ?>
        </div>


        


        

        
    </main>

    <script src="../js/sidebar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>